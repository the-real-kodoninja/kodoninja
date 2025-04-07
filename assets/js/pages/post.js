document.addEventListener('DOMContentLoaded', () => {
    const editor = document.getElementById('post-editor');
    const contentInput = document.getElementById('post-content');
    const toolbarButtons = document.querySelectorAll('.wysiwyg-btn');
    const postForm = document.getElementById('post-form');
    const previewBtn = document.querySelector('.preview-btn');
    const saveDraftBtn = document.querySelector('.save-draft-btn');

    // WYSIWYG Toolbar Functionality
    toolbarButtons.forEach(button => {
        button.addEventListener('click', () => {
            const command = button.dataset.command;
            if (command) {
                document.execCommand(command, false, null);
                editor.focus();
            }
        });
    });

    // Update hidden input with editor content on input
    editor.addEventListener('input', () => {
        contentInput.value = editor.innerHTML;
    });

    // Preview Button
    if (previewBtn) {
        previewBtn.addEventListener('click', () => {
            const previewWindow = window.open('', 'Preview', 'width=800,height=600');
            previewWindow.document.write(`
                <html>
                <head>
                    <title>Preview</title>
                    <link rel="stylesheet" href="/assets/css/core.css">
                    <style>
                        body { padding: 20px; background: #1a1a1a; color: #e0e0e0; font-family: 'Roboto', sans-serif; }
                        .preview-content { max-width: 800px; margin: 0 auto; }
                    </style>
                </head>
                <body>
                    <div class="preview-content">${editor.innerHTML}</div>
                </body>
                </html>
            `);
            previewWindow.document.close();
        });
    }

    // Form Submission
    postForm.addEventListener('submit', (e) => {
        e.preventDefault();
        contentInput.value = editor.innerHTML;
        fetch(postForm.action, {
            method: 'POST',
            body: new FormData(postForm)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.redirect;
            } else {
                alert('Error creating post');
            }
        });
    });

    // Save Draft
    if (saveDraftBtn) {
        saveDraftBtn.addEventListener('click', () => {
            const content = editor.innerHTML;
            fetch('/api/save_draft.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ content })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Draft saved!');
                }
            });
        });
    }

    // Autocomplete for @mentions
    editor.addEventListener('input', (e) => {
        const text = editor.textContent;
        if (text.includes('@')) {
            // Simulate fetching users (replace with real API call)
            const users = ['kodoninja', 'user1', 'user2'];
            const mention = text.split('@').pop().split(' ')[0];
            if (mention) {
                const suggestions = users.filter(user => user.startsWith(mention));
                // Display suggestions (simplified for now)
                console.log(suggestions);
                // TODO: Add a dropdown for suggestions below the editor
            }
        }
    });
});
