angular.module("templates", []).run(["$templateCache", function($templateCache) {$templateCache.put("directives/example.html","<div class=\"example-directive\">\r\n  <h1>Directive title: {{title}} </h1>\r\n</div>");
$templateCache.put("directives/example2.html","<div class=\"example-directive2\">\r\n  <h1>Example 2: Directive title: {{title}} </h1>\r\n</div>");}]);