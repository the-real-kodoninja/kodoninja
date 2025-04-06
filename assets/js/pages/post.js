document.addEventListener('DOMContentLoaded', () => {
    // Prevent duplicate event listeners
    if (window.kodoninjaPostInitialized) return;
    window.kodoninjaPostInitialized = true;

    const editor = document.getElementById('editor');
    const preview = document.getElementById('post-preview');
    const editorContent = document.getElementById('editor-content');
    const toggleBtn = document.getElementById('toggle-preview');
    const hiddenContent = document.getElementById('content');
    const toolbarButtons = document.querySelectorAll('.toolbar-btn');
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    const emojiBtn = document.getElementById('emoji-btn');
    const emojiPicker = document.getElementById('emoji-picker');

    // Initialize editor placeholder
    if (editor.textContent.trim() === 'Share your journey, goals, or insights...') {
        editor.classList.add('placeholder');
    }

    editor.addEventListener('focus', () => {
        if (editor.classList.contains('placeholder')) {
            editor.textContent = '';
            editor.classList.remove('placeholder');
        }
    });

    editor.addEventListener('blur', () => {
        if (!editor.textContent.trim()) {
            editor.textContent = 'Share your journey, goals, or insights...';
            editor.classList.add('placeholder');
        }
    });

    // Ensure editor is focused and handle formatting with DOM manipulation
    const applyFormatting = (command, value = null) => {
        editor.focus();
        const selection = window.getSelection();
        if (!selection.rangeCount) return;

        let range = selection.getRangeAt(0);
        let selectedText = range.toString();

        // Helper to wrap selected text in a tag with styles
        const wrapSelection = (tag, styles = {}) => {
            const element = document.createElement(tag);
            Object.assign(element.style, styles);
            if (selectedText) {
                element.textContent = selectedText;
            } else {
                element.innerHTML = ' '; // Ensure empty elements are editable
            }
            range.deleteContents();
            range.insertNode(element);

            // Move cursor inside the new element
            range = document.createRange();
            range.selectNodeContents(element);
            range.collapse(false);
            selection.removeAllRanges();
            selection.addRange(range);
        };

        // Helper to find the closest block-level parent
        const getBlockParent = (node) => {
            while (node && node.nodeType !== 1) {
                node = node.parentElement;
            }
            return node && ['DIV', 'P', 'H1', 'H2', 'UL', 'OL'].includes(node.tagName) ? node : null;
        };

        if (command === 'bold') {
            wrapSelection('span', { fontWeight: 'bold' });
        } else if (command === 'italic') {
            wrapSelection('span', { fontStyle: 'italic' });
        } else if (command === 'underline') {
            wrapSelection('span', { textDecoration: 'underline' });
        } else if (command === 'strikeThrough') {
            wrapSelection('span', { textDecoration: 'line-through' });
        } else if (command === 'formatBlock') {
            const tag = value.toLowerCase();
            let blockParent = getBlockParent(range.commonAncestorContainer);
            if (blockParent && blockParent.tagName.toLowerCase() === tag) {
                // If already in the desired tag, convert to paragraph
                const p = document.createElement('p');
                p.innerHTML = blockParent.innerHTML;
                blockParent.parentNode.replaceChild(p, blockParent);
            } else {
                wrapSelection(tag);
            }
        } else if (command === 'insertUnorderedList' || command === 'insertOrderedList') {
            const tag = command === 'insertUnorderedList' ? 'ul' : 'ol';
            let blockParent = getBlockParent(range.commonAncestorContainer);

            if (blockParent && (blockParent.tagName === 'UL' || blockParent.tagName === 'OL')) {
                // If already in a list, unwrap it
                const parent = blockParent.parentNode;
                while (blockParent.firstChild) {
                    parent.insertBefore(blockParent.firstChild, blockParent);
                }
                parent.removeChild(blockParent);
            } else {
                const list = document.createElement(tag);
                const li = document.createElement('li');
                li.textContent = selectedText || 'List item';
                list.appendChild(li);
                range.deleteContents();
                range.insertNode(list);

                // Move cursor inside the list item
                range = document.createRange();
                range.selectNodeContents(li);
                range.collapse(false);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        } else if (command === 'justifyLeft' || command === 'justifyCenter' || command === 'justifyRight' || command === 'justifyFull') {
            const align = {
                'justifyLeft': 'left',
                'justifyCenter': 'center',
                'justifyRight': 'right',
                'justifyFull': 'justify'
            }[command];
            let blockParent = getBlockParent(range.commonAncestorContainer);
            if (blockParent) {
                blockParent.style.textAlign = align;
            } else {
                const p = document.createElement('p');
                p.style.textAlign = align;
                if (selectedText) {
                    p.textContent = selectedText;
                } else {
                    p.innerHTML = ' ';
                }
                range.deleteContents();
                range.insertNode(p);

                // Move cursor inside the paragraph
                range = document.createRange();
                range.selectNodeContents(p);
                range.collapse(false);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        } else if (command === 'createLink') {
            const url = prompt('Enter the URL:');
            if (url) {
                const a = document.createElement('a');
                a.href = url;
                a.textContent = selectedText || url;
                range.deleteContents();
                range.insertNode(a);

                // Move cursor after the link
                range = document.createRange();
                range.setStartAfter(a);
                range.collapse(true);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        } else if (command === 'removeFormat') {
            // Remove inline styles by replacing with plain text
            const parent = range.commonAncestorContainer;
            const text = document.createTextNode(selectedText || ' ');
            range.deleteContents();
            range.insertNode(text);

            // Move cursor after the text
            range = document.createRange();
            range.setStartAfter(text);
            range.collapse(true);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    };

    // Update hidden input for form submission
    const updateHiddenContent = () => {
        hiddenContent.value = editor.innerHTML;
        document.querySelector('.preview-content').innerHTML = editor.innerHTML;
    };

    // Toolbar functionality
    toolbarButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const command = button.dataset.command;
            if (command) {
                if (command === 'createLink' || command === 'insertImage' || command === 'insertVideo') {
                    if (command === 'insertImage') {
                        document.getElementById('image-upload').click();
                    } else if (command === 'insertVideo') {
                        document.getElementById('video-upload').click();
                    } else {
                        applyFormatting(command);
                    }
                } else if (command.startsWith('formatBlock:')) {
                    const tag = command.split(':')[1];
                    applyFormatting('formatBlock', tag);
                } else {
                    applyFormatting(command);
                }
            }
            updateHiddenContent();
        });
    });

    // Dropdown toggle functionality
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            const dropdown = toggle.nextElementSibling;
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        dropdownToggles.forEach(toggle => {
            const dropdown = toggle.nextElementSibling;
            if (!toggle.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.style.display = 'none';
            }
        });
    });

    // Emoji picker toggle
    emojiBtn.addEventListener('click', () => {
        emojiPicker.style.display = emojiPicker.style.display === 'block' ? 'none' : 'block';
    });

    // Insert emoji
    document.querySelectorAll('.emoji').forEach(emoji => {
        emoji.addEventListener('click', () => {
            const emojiText = emoji.dataset.emoji;
            editor.focus();
            const selection = window.getSelection();
            if (selection.rangeCount) {
                const range = selection.getRangeAt(0);
                range.insertNode(document.createTextNode(emojiText));
                range.collapse(false);
            } else {
                editor.appendChild(document.createTextNode(emojiText));
            }
            emojiPicker.style.display = 'none';
            updateHiddenContent();
        });
    });

    // Close emoji picker when clicking outside
    document.addEventListener('click', (e) => {
        if (!emojiBtn.contains(e.target) && !emojiPicker.contains(e.target)) {
            emojiPicker.style.display = 'none';
        }
    });

    // Image upload
    document.getElementById('image-upload').addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                const img = document.createElement('img');
                img.src = event.target.result;
                img.style.maxWidth = '100%';
                img.style.borderRadius = '8px';
                editor.focus();
                const selection = window.getSelection();
                if (selection.rangeCount) {
                    const range = selection.getRangeAt(0);
                    range.insertNode(img);
                    range.collapse(false);
                } else {
                    editor.appendChild(img);
                }
                updateHiddenContent();
            };
            reader.readAsDataURL(file);
        }
    });

    // Video upload
    document.getElementById('video-upload').addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                const video = document.createElement('video');
                video.src = event.target.result;
                video.controls = true;
                video.style.maxWidth = '100%';
                video.style.borderRadius = '8px';
                editor.focus();
                const selection = window.getSelection();
                if (selection.rangeCount) {
                    const range = selection.getRangeAt(0);
                    range.insertNode(video);
                    range.collapse(false);
                } else {
                    editor.appendChild(video);
                }
                updateHiddenContent();
            };
            reader.readAsDataURL(file);
        }
    });

    // Update preview on input
    editor.addEventListener('input', updateHiddenContent);

    // Toggle between editor and preview
    toggleBtn.addEventListener('click', () => {
        const isPreview = preview.style.display === 'block';
        preview.style.display = isPreview ? 'none' : 'block';
        editorContent.style.display = isPreview ? 'block' : 'none';
        toggleBtn.textContent = isPreview ? 'Preview' : 'Edit';
    });

    // Save draft (store in localStorage for now)
    const saveDraftBtn = document.getElementById('save-draft');
    saveDraftBtn.addEventListener('click', () => {
        localStorage.setItem('draft', editor.innerHTML);
        alert('Draft saved!');
    });

    // Edit mode (reload draft)
    const editModeBtn = document.getElementById('edit-mode');
    editModeBtn.addEventListener('click', () => {
        const draft = localStorage.getItem('draft');
        if (draft) {
            editor.innerHTML = draft;
            updateHiddenContent();
        } else {
            alert('No draft found.');
        }
    });

    // Contribute (placeholder for collaboration feature)
    const contributeBtn = document.getElementById('contribute');
    contributeBtn.addEventListener('click', () => {
        alert('Contribute feature coming soon! Invite others to collaborate on this post.');
    });

    // Nimbus.ai functionality
    const nimbusBtn = document.getElementById('nimbus-ai-btn');
    const modal = document.getElementById('nimbus-ai-modal');
    const closeModal = document.querySelector('.modal-close');
    const aiOptions = document.querySelectorAll('.ai-option');
    const aiOutput = document.getElementById('ai-output');
    const aiInsert = document.getElementById('ai-insert');
    let aiGeneratedText = '';

    nimbusBtn.addEventListener('click', () => {
        modal.style.display = 'flex';
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    aiOptions.forEach(option => {
        option.addEventListener('click', () => {
            const action = option.dataset.action;
            let output = '';

            if (action === 'suggest-title') {
                output = '5 Steps to Unlock Your Inner Resilience';
            } else if (action === 'expand-idea') {
                const currentContent = editor.innerText.trim();
                output = `${currentContent}\n\nHere’s how to take it further: Start by setting small, achievable goals each day. For example, dedicate 10 minutes to mindfulness practice. Over time, these habits compound, leading to massive growth.`;
            } else if (action === 'motivational-quote') {
                output = '"The journey of a thousand miles begins with a single step." — Lao Tzu';
            }

            aiOutput.textContent = output;
            aiGeneratedText = output;
            aiInsert.style.display = 'block';
        });
    });

    aiInsert.addEventListener('click', () => {
        const p = document.createElement('p');
        p.textContent = aiGeneratedText;
        editor.appendChild(p);
        modal.style.display = 'none';
        updateHiddenContent();
    });
});
