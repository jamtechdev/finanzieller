// Rich Text Editor using Quill
import Quill from 'quill';
import 'quill/dist/quill.snow.css';

const DEFAULT_OPTIONS = {
    theme: 'snow',
    placeholder: 'Write your content here...',
    modules: {
        toolbar: [
            [{ header: [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            [{ indent: '-1' }, { indent: '+1' }],
            ['link'],
            ['blockquote'],
            ['clean'],
        ],
    },
};

function initSingleEditor(textarea) {
    if (!textarea || textarea.closest('.quill-editor-wrapper')) return null;

    const wrapper = document.createElement('div');
    wrapper.className = 'quill-editor-wrapper';
    wrapper.style.marginBottom = '1rem';

    const editorContainer = document.createElement('div');
    editorContainer.className = 'quill-editor-container';
    editorContainer.style.minHeight = '200px';
    editorContainer.style.backgroundColor = '#fff';

    textarea.parentNode.insertBefore(wrapper, textarea);
    wrapper.appendChild(editorContainer);
    wrapper.appendChild(textarea);

    textarea.style.display = 'none';

    const quill = new Quill(editorContainer, {
        ...DEFAULT_OPTIONS,
        placeholder: textarea.placeholder || DEFAULT_OPTIONS.placeholder,
    });

    const initialValue = textarea.value?.trim() || '';
    if (initialValue) {
        quill.root.innerHTML = initialValue;
    }

    const form = textarea.closest('form');
    if (form) {
        form.addEventListener('submit', function () {
            textarea.value = quill.root.innerHTML;
        });
    }

    return quill;
}

export function initEditor(selector = '.rich-editor') {
    const textareas = document.querySelectorAll(selector);
    const editors = new Map();

    textareas.forEach((textarea) => {
        const quill = initSingleEditor(textarea);
        if (quill) editors.set(textarea, quill);
    });

    return editors;
}

/** Call from inline scripts (e.g. after adding a new slide) to init Quill on one textarea */
export function initEditorFor(textarea) {
    if (typeof textarea === 'string') {
        textarea = document.querySelector(textarea);
    }
    return textarea ? initSingleEditor(textarea) : null;
}

export const editorCommands = {
    bold: () => document.execCommand('bold'),
    italic: () => document.execCommand('italic'),
    underline: () => document.execCommand('underline'),
    insertLink: (url) => document.execCommand('createLink', url),
    insertImage: (url) => document.execCommand('insertImage', url),
    formatHeading: (level) => document.execCommand('formatBlock', `h${level}`),
    formatParagraph: () => document.execCommand('formatBlock', 'p'),
    insertList: (ordered = false) => document.execCommand(ordered ? 'insertOrderedList' : 'insertUnorderedList'),
};
