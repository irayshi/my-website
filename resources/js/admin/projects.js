const modal = document.querySelector("#project-modal");

if (modal) {
  const form = modal.querySelector("#project-form");
  const imageInput = modal.querySelector("#project-images");
  const imagePreview = modal.querySelector("[data-image-preview]");
  const dropzone = modal.querySelector("[data-image-dropzone]");
  const clientField = modal.querySelector("[data-client-field]");
  const clientInput = modal.querySelector("#project-client");
  let selectedImages = [];
  let coverIndex = 0;

  const refreshIcons = () => window.lucide?.createIcons();

  const setPageScrollLocked = (isLocked) => {
    document.documentElement.classList.toggle("project-modal-open", isLocked);
    document.body.classList.toggle("project-modal-open", isLocked);
  };

  const updateClientField = () => {
    const isExternal = form.elements.project_type.value === "external";
    clientField.classList.toggle("hidden", !isExternal);
    clientInput.required = isExternal;
    clientInput.disabled = !isExternal;
  };

  const syncImageInput = () => {
    if (typeof DataTransfer === "undefined") return;
    const transfer = new DataTransfer();
    selectedImages.forEach((file) => transfer.items.add(file));
    imageInput.files = transfer.files;
  };

  const renderImages = () => {
    imagePreview.classList.toggle("hidden", selectedImages.length === 0);
    imagePreview.classList.toggle("grid", selectedImages.length > 0);
    imagePreview.innerHTML = selectedImages
      .map((file, index) => {
        const imageUrl = URL.createObjectURL(file);
        const isCover = index === coverIndex;

        return `
          <article class="group relative aspect-4/3 overflow-hidden rounded-xl border ${isCover ? "border-crimson" : "border-white/10"}">
            <img class="h-full w-full object-cover" src="${imageUrl}" alt="Preview gambar proyek ${index + 1}" />
            <div class="absolute inset-x-0 bottom-0 flex items-center justify-between gap-2 bg-linear-to-t from-black/90 to-transparent p-2 pt-8">
              <label class="cursor-pointer">
                <input class="peer sr-only" type="radio" name="cover_image" value="${index}" ${isCover ? "checked" : ""} data-cover-index="${index}" />
                <span class="rounded-full border border-white/20 bg-black/50 px-2.5 py-1 text-[11px] font-semibold text-zinc-300 peer-checked:border-crimson peer-checked:bg-crimson peer-checked:text-white">
                  ${isCover ? "Cover" : "Jadikan cover"}
                </span>
              </label>
              <button class="flex h-7 w-7 items-center justify-center rounded-full bg-black/60 text-zinc-300 hover:bg-red-500 hover:text-white" type="button" data-remove-image="${index}" aria-label="Hapus gambar ${index + 1}">
                <i data-lucide="trash-2" class="h-3.5 w-3.5"></i>
              </button>
            </div>
          </article>
        `;
      })
      .join("");

    refreshIcons();
  };

  const addImages = (files) => {
    const images = Array.from(files).filter((file) => file.type.startsWith("image/"));
    selectedImages = [...selectedImages, ...images];
    if (selectedImages.length === images.length) coverIndex = 0;
    syncImageInput();
    renderImages();
  };

  document.querySelector("[data-open-project-modal]")?.addEventListener("click", () => {
    modal.showModal();
    setPageScrollLocked(true);
    modal.querySelector("#project-name")?.focus();
  });

  modal.querySelectorAll("[data-close-project-modal]").forEach((button) => {
    button.addEventListener("click", () => modal.close());
  });

  modal.addEventListener("click", (event) => {
    if (event.target === modal) modal.close();
  });

  modal.addEventListener("close", () => setPageScrollLocked(false));

  form.querySelectorAll('input[name="project_type"]').forEach((radio) => {
    radio.addEventListener("change", updateClientField);
  });

  imageInput.addEventListener("change", () => {
    addImages(imageInput.files);
  });

  ["dragenter", "dragover"].forEach((eventName) => {
    dropzone.addEventListener(eventName, (event) => {
      event.preventDefault();
      dropzone.classList.add("is-dragging");
    });
  });

  ["dragleave", "drop"].forEach((eventName) => {
    dropzone.addEventListener(eventName, (event) => {
      event.preventDefault();
      dropzone.classList.remove("is-dragging");
    });
  });

  dropzone.addEventListener("drop", (event) => addImages(event.dataTransfer.files));

  imagePreview.addEventListener("change", (event) => {
    const radio = event.target.closest("[data-cover-index]");
    if (!radio) return;
    coverIndex = Number(radio.dataset.coverIndex);
    renderImages();
  });

  imagePreview.addEventListener("click", (event) => {
    const removeButton = event.target.closest("[data-remove-image]");
    if (!removeButton) return;
    const removedIndex = Number(removeButton.dataset.removeImage);
    selectedImages.splice(removedIndex, 1);
    if (coverIndex === removedIndex) coverIndex = 0;
    if (coverIndex > removedIndex) coverIndex -= 1;
    syncImageInput();
    renderImages();
  });

  form.addEventListener("submit", (event) => {
    event.preventDefault();
  });

  updateClientField();
}
