($ => {
  $(document).ready(() => {
    $(window).on("scroll", () => {
      let winScroll = $(window).scrollTop(),
        winHeight = $(window).height(),
        article = $("#js-article"),
        articleHeight = article.outerHeight(true);

      winScroll >= article.offset().top
        ? $("#js-progress-header").addClass("active")
        : $("#js-progress-header").removeClass("active");

      let totalWidth = () => {
        let currentHeight = winScroll / (articleHeight - winHeight) * 100;

        if (currentHeight >= 100) {
          return (currentHeight = 100 + "%");
        }

        return currentHeight + "%";
      };

      $("#js-progress-bar").css("width", totalWidth());
    });
  });
})(jQuery);
