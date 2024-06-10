// typeahead custom js

(function ($) {
  $(document).ready(function () {
    var engine = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: "path/to/data.json",
      identify: function (obj) {
        return obj.id;
      },
    });
  });
})(jQuery);
