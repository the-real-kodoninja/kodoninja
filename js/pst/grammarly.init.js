
// Initialize Grammarly
const grammarly = await Grammarly.init();

// Add Grammarly suggestions to the element
const grammarlyPluginElement = grammarly.addPlugin(
  document.querySelector("#body1_ptX"),
  {
    documentDialect: "british",
    autocomplete: "on"
  }
);

// Initialize TinyMCE
const tinyEditors = await tinymce.init({
  selector: "#body1_ptX"
});
const tinyEditor = tinyEditors[0];

// Set the editor and viewport to the newly created TinyMCE elements
const editor = tinyEditor.getBody(); // <body contenteditable=true>
const viewport = tinyEditor.iframeElement; // <iframe> that contains the body
grammarlyPluginElement.connect(editor, viewport);
