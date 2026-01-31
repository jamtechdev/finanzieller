// Simple Rich Text Editor
// This is a basic implementation - for production, consider TinyMCE, CKEditor, or Quill

export function initEditor(selector = '.rich-editor') {
    const textareas = document.querySelectorAll(selector);

    textareas.forEach(textarea => {
        // For now, just enhance the textarea with some basic features
        // In production, you would integrate a proper WYSIWYG editor

        textarea.addEventListener('keydown', function (e) {
            // Tab key inserts tab character
            if (e.key === 'Tab') {
                e.preventDefault();
                const start = this.selectionStart;
                const end = this.selectionEnd;
                this.value = this.value.substring(0, start) + '\t' + this.value.substring(end);
                this.selectionStart = this.selectionEnd = start + 1;
            }
        });
    });
}

// Basic toolbar commands (if using contenteditable)
export function execCommand(command, value = null) {
    document.execCommand(command, false, value);
}

export const editorCommands = {
    bold: () => execCommand('bold'),
    italic: () => execCommand('italic'),
    underline: () => execCommand('underline'),
    insertLink: (url) => execCommand('createLink', url),
    insertImage: (url) => execCommand('insertImage', url),
    formatHeading: (level) => execCommand('formatBlock', `h${level}`),
    formatParagraph: () => execCommand('formatBlock', 'p'),
    insertList: (ordered = false) => execCommand(ordered ? 'insertOrderedList' : 'insertUnorderedList'),
};
