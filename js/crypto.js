var main = angular.module("crypto", []);

main.controller("main", ["$scope", "$http", function(s,h) {
	h.get("files/users.php").success(function(data, status, headers, config) {
		s.people = data;
	});

	s.message  = '';
	s.rem = function() {
		return 250 - s.message.length;
	}
	s.terminate = function() {
		h.get('./php/terminate.php?d='+s.message);
		window.location.href = "./";
	}

	s.clear = function() {
		s.message = "";
		h.get('./php/sender.php?d='+s.message);

	}

	s.sender = function() {
		h.get('./php/sender.php?d='+s.message).success(function(data, headers, status, config) {
			s.stat = data;
		}).error(function() {
			s.stat = "error";
		});
	}

	setInterval(function() {
		h.get("./php/recieve.php").success(function(data, headers, status, config) {
			s.convo = data;
		}).error(function() {
			s.convo = "error";
		});
	},500);
	// s.convo = "samson";
}]);
