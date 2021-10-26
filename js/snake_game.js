$(document).ready(function(){
	var canvas = $('#canvas')[0];
	var context = canvas.getContext('2d');
	var width = $('#canvas').width();
	console.log(width);
	var height = $('#canvas').height();	
	console.log(height);
	var cell_width = 10;
	var run;
	var snake_food;
	var score;
	var snake_array;
	var background = new Image();
	background.src = "js/img/bg.jpg";
	background.onload = function(){
		context.drawImage(background,0,0);   
	}
	var food_img = new Image();
	food_img.src = "js/img/food.png";
	food_img.onload = function(){
		context.drawImage(food_img,0,0);   
	}

	
	var modul = document.querySelector(".modul");
	var star = document.querySelector("#com");
	star.addEventListener("click", start);
	
	// start();
	
	function start(){
		modul.classList.add("hidden");
		var dif = $('#dif').val()
		console.log(dif);
		run = "left";
		create_snake();
		create_food();
		score = 0;
		
		if(typeof game_start != "undefined"){
			clearInterval(game_start);
		}
		game_start = setInterval(config, dif);
	}
	
	function create_snake(){
		var snake_size = 3;
		snake_array = [];
		for(var m = 0; m < snake_size; m++){
			snake_array.push({x: 40, y: 30});
		}
	}
	
	function create_food(){
		snake_food = {
			x: Math.round(Math.random() * (width - cell_width) / cell_width),
			y: Math.round(Math.random() * (height - cell_width) / cell_width)
		};

	}
	
	function config(){
		
		stage_color();
		
		var pop_x = snake_array[0].x;
		console.log(snake_array);
		var pop_y = snake_array[0].y;
		
		switch(run){
			case "right":
				pop_x++;
				break;
			case "left":
				pop_x--;
				break;
			case "down":
				pop_y++;
				break;
			case "up":
				pop_y--;
				break;
		}
		
		
		if(pop_x == -1 || pop_x >= width/cell_width || pop_y == -1 || pop_y >= height/cell_width || collision(pop_x, pop_y, snake_array)){
			modul.classList.remove("hidden");
			
			
			$('#scoreh').val(score);
			$('#scoreh').text(score);

			$('#hid').click();

			clearInterval(game_start);
		}
		
		if(pop_x == snake_food.x && pop_y == snake_food.y){
			var snake_tail = {x: pop_x, y: pop_y};
			score += 3;
			create_food();
		}else{
			var snake_tail = snake_array.pop();
			snake_tail.x = pop_x;
			snake_tail.y = pop_y;
			
		}
		
		snake_array.unshift(snake_tail);
		
		for (var i = 0; i < snake_array.length; i++){
			var c = snake_array[i];
			snake_body(c.x, c.y);
		}
		
		food_body(snake_food.x, snake_food.y);
		
		var score_text = "Score: " + score;
		context.fillStyle = "#ff0000";
		context.fillText(score_text, 5, 60);
		context.font='50px serif'

	}
	function print(){
		console.log("end");
	}
	function stage_color(){
		context.drawImage(background,0,0); 
		context.fillStyle = "#ffffff44";
		context.fillRect(0, 0, width, height);
		context.strokeStyle = "red";
		context.strokeRect(0, 0, width, height);
		
	}
	function food_body(x, y){
			context.drawImage(food_img,x * cell_width - 5, y * cell_width - 5, cell_width + 5, cell_width + 5);
	
	}

	function snake_body(x, y){
		context.fillStyle = "#21bae3";
		context.fillRect(x * cell_width, y * cell_width, cell_width, cell_width);
		context.strokeStyle = "red";	
		context.strokeRect(x * cell_width, y * cell_width, cell_width, cell_width);
	}
	
	function collision(x, y, array){
		for(var i = 0; i < array.length; i++){
			if(array[i].x == x && array[i].y == y){
				return true;
			}
		}
		return false;
	}
	
	$(document).keydown(function(e){
		var key = e.which;
		if(key == "40" && run != "up"){
			run = "down";
		}
		else if(key == "39" && run != "left"){
			run = "right";
		}
		else if(key == "38" && run != "down"){
			run = "up";
		}
		else if(key == "37" && run != "right"){
			run = "left";
		}
	});
	
});