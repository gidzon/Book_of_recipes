$(document).ready(function(){
    $("#button").on("click", function(){
      $("#title").clone().insertAfter("#title");
      $("#text").clone().insertAfter("#text");
      });
  });

  $(document).ready(function () {
    $("#add_input").on("click", function(){
      $("#name").clone().insertAfter("#name");
      $("#description").clone().insertAfter("#description");
    });
  });
  