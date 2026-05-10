export function mobileState() {
  const currentlyMobile = ref(false);

  const updateWidth = () => {
    if (process.client) {
      currentlyMobile.value = window.matchMedia("(max-width: 768px)").matches;
    }
  };

  onMounted(() => {
    updateWidth();
    window.addEventListener("resize", updateWidth);
  });

  onUnmounted(() => {
    window.removeEventListener("resize", updateWidth);
  });

  return {
    currentlyMobile,
  };
}