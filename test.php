<!DOCTYPE html>
<html>
<head>
	<title>Test Page</title>
	<?php include 'lib/meta.php' ?>
</head>
<body>
<a href="#" class="error">Test notify</a>
</body>
</html>
<script type="text/javascript">
(function() {
	$(function() {
    $.growl({
      title: "Growl",
      message: "The kitten is awake!"
    });
    $('.error').click(function(event) {
      event.preventDefault();
      event.stopPropagation();
      return $.growl.error({
        message: "The kitten is attacking!"
      });
    });
    $('.notice').click(function(event) {
      event.preventDefault();
      event.stopPropagation();
      return $.growl.notice({
        message: "The kitten is cute!"
      });
    });
    return $('.warning').click(function(event) {
      event.preventDefault();
      event.stopPropagation();
      return $.growl.warning({
        message: "The kitten is ugly!"
      });
    });
  });

}).call(this);

</script>