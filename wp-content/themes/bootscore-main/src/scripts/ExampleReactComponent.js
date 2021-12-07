wp.blocks.registerBlockType("test/my-first-block", {
    title: "Testblock",
    icon: "dashicons-admin-user",
    category: "common",
    attributes: {
      skyColor: { type: "string" },
      grassColor: { type: "string" }
    },
    edit: () => <div>Hi!</div>,
    save: () => <div>Hi, this block is saved!</div>
});
