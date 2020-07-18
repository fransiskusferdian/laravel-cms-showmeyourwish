  $('.photo-item').isotope({
      itemSelector: '.photo',
      layoutMode: 'fitRows'
  });

  $('.photo-portfolio ul button').click(function () {
      $('.photo-portfolio ul button').removeClass('active');
      $(this).addClass('active');

      var selector = $(this).attr('data-filter');
      $('.photo-item').isotope({
          filter: selector
      });
      return false;
  });

  //****************************
  // Isotope Load more button
  //****************************
  var initShow = 3; //number of items loaded on init & onclick load more button
  var counter = initShow; //counter for load more button
  var iso = $container.data('isotope'); // get Isotope instance

  loadMore(initShow); //execute function onload

  function loadMore(toShow) {
      $container.find(".active").removeClass("active");

      var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function (item) {
          return item.element;
      });
      $(hiddenElems).addClass('active');
      $container.isotope('layout');

      //when no more to load, hide show more button
      if (hiddenElems.length == 0) {
          jQuery("#load-more").hide();
      } else {
          jQuery("#load-more").show();
      };

  }

  //append load more button


  //when load more button clicked
  $("#load-more").click(function () {
      if ($('.photo-portfolio ul button').data('clicked')) {
          //when filter button clicked, set initial value for counter
          counter = initShow;
          $('.photo-portfolio ul button').data('clicked', false);
      } else {
          counter = counter;
      };

      counter = counter + initShow;

      loadMore(counter);
  });

  //when filter button clicked
  $(".photo-portfolio ul button'").click(function () {
      $(this).data('clicked', true);

      loadMore(initShow);
  });