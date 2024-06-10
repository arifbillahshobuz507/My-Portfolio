// Custom filepond js

// Get a reference to the file input element
const inputElement = document.querySelectorAll('input[type="file"]');

inputElement.forEach((item) => {
  // Create a FilePond instance
  if (item.classList.contains("no-preview")) {
    // Register the plugin
    FilePond.registerPlugin(FilePondPluginFileRename);
    const pond = FilePond.create(item);
  }

  if (item.classList.contains("show-preview")) {
    FilePond.registerPlugin(FilePondPluginImagePreview);
    const pond = FilePond.create(item);
  }

  if (item.classList.contains("transform-preview")) {
    FilePond.registerPlugin(FilePondPluginImageTransform);
    const pond = FilePond.create(item);
  }

  FilePond.create({
    fileMetadataObject: {
      markup: [
        [
          "rect",
          {
            left: 0,
            right: 0,
            bottom: 0,
            height: "60px",
            backgroundColor: "rgba(0,0,0,.5)",
          },
        ],
        [
          "image",
          {
            right: "10px",
            bottom: "10px",
            width: "128px",
            height: "34px",
            src: "./filepond-logo.svg",
            fit: "contain",
          },
        ],
      ],
    },
    onpreparefile: (file, output) => {
      const img = new Image();
      img.src = URL.createObjectURL(output);
      document.body.appendChild(img);
    },
  });
});
