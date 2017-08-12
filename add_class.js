/* class js */
/**
 * Add a class to an active link in the mega menu
 */

//zet class op actieve link
$(document).ready(function() {
  $("[href]").each(function() {
      if (this.href == window.location.href) {
          $(this).addClass("active");
      }
    })
  });
