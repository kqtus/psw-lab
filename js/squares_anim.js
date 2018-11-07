var numSquares = 0;
var squares = [];

var max_width_str = '900';
var max_height_str = '500';

var canvas;

function createSquare(pos) {
    numSquares++;

    console.log('creating square on pos ' + pos)
    var square = document.createElement("div");
    square.style.left = pos.x;
    square.style.right = pos.y;
    square.style.width = "5px";
    square.style.height = "5px";

    var color = "";
    switch (numSquares % 4) {
        case 0:
            color = "#000000";
            break;
        case 1:
            color = "#111111";
            break;
        case 2:
            color = "#222222";
            break;
        case 3:
            color = "#333333";
            break;
    }

    square.style.backgroundColor = color;
    square.id = "square" + numSquares;
    document.body.appendChild(square);

    return square;
}

function getRandomPosOnScreen() {
    var x = Math.floor(Math.random() * parseInt(max_width_str));
    var y = Math.floor(Math.random() * parseInt(max_height_str));

    return (x=x, y=y);
}

function init() {
    createCanvas();
    createSquares();
}

function createCanvas() {
    canvas = document.createElement('canvas');

    canvas.id = "Layer";
    canvas.width = parseInt(max_width_str);
    canvas.height = parseInt(max_height_str);
    canvas.style.color = '#55FF55';

    document.body.appendChild(canvas);
}

function createSquares() {
    var num_squares_to_create = Math.floor(Math.random() * 50) + 50;

    while (num_squares_to_create > 0) {
        var square = createSquare(getRandomPosOnScreen());
        squares.push(square);

        num_squares_to_create--;
    }
}

function updateSquare(square) {
    square.style.left++;
    square.style.right++;
}

function updateSquares() {
    for (var i = 0; i < squares.length; i++) {
        updateSquare(squares[i]);
    }
}