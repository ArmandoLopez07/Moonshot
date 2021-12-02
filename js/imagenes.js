var folder = "../imagenes/galery/";

$.ajax({
  url: folder,
  success: function (data) {
    $(data)
      .find("a")
      .attr("href", function (i, val) {
        if (val.match(/\.(jpe?g|png|gif)$/)) {
          $(".galeria").append(
            "<div class='grilla'><img src='" + folder + val + "'></div>"
          );
        }
      });
  },
});
