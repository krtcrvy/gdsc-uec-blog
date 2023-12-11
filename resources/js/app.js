import "./bootstrap";
import Alpine from "alpinejs";
import persist from "@alpinejs/persist";
import EasyMDE from "easymde";

Alpine.plugin(persist);

document.addEventListener("livewire:navigated", () => {
    const easyMDE = new EasyMDE({
        element: document.getElementById("markdown-editor"),
        toolbar: [
            "bold",
            "italic",
            "heading-2",
            "heading-3",
            "|",
            "quote",
            "code",
            "unordered-list",
            "ordered-list",
            "|",
            "link",
            "image",
            "table",
            "horizontal-rule",
            "|",
            "preview",
            "side-by-side",
            "fullscreen",
            "|",
            "guide",
        ],
    });
});
