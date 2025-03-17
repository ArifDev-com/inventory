@extends('layouts.app')
@section('content')


<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


<style>
    @font-face
{
font-family: digital;
src: url(https://res.cloudinary.com/thepeted/raw/upload/v1507751384/DSDIGI_ctlean.ttf);
}

html {
height: 100%;
}

body {
/* background: linear-gradient(135deg, #3a7f99, #34495e) fixed; */
background-repeat: no-repeat;
background-attachment: fixed;
font-family: 'Open Sans';
font-weight: 700;
}

.clearfix{
clear: both;
}

.calculator {
background: #E7E5E4;
/* width: 264px; */
padding: 0 10px 10px 10px;
border: 1px solid hsl(0,02%,65%);
border-radius: 6px;
box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); 
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
}

.wrapper {
position: relative;
width: 264px;
margin: 0 auto;
}

.logo {
font-size: 0.5em;
text-align: center;
color: hsl(0,0%,55%);
margin: 5px auto;
}

.display {
font-family: 'digital';
color: hsl(25, 5%, 30%);
position: relative;
border: 3px inset #fff;
margin-bottom: 15px;
width: 258px;
border-radius: 8px;
}

#mem-indicator {
font-size: 1.4em;
position: absolute;
top: 6px;
left: 8px;
}

input {
font-family: inherit;
padding:0.05em 8px;
letter-spacing: 0.02em;
font-size: 2.5em;
text-align: right;
width: 252px;
background: #C8CAAF;
border: 3px solid hsl(25,10%,30%);
border-radius: 5px;
}

button {
display: block;
float: left;
margin: 4px;
width: 58px;
height: 40px;
font-size: 1.25em;
border-radius: 6px;
-webkit-tap-highlight-color: transparent;
}

#double-width-btn {
width: 124px;
}

#double-height-btn {
height: 86px;
}

button:focus, button:hover {
outline: 0;
}

button:active {
box-shadow: none;
}

.mem-key {
font-size: 1em;
background-image: linear-gradient(to top, hsl(40,4%,27%), hsl(40,4%,35%) );
color: #FEFCF7;
border: 1px solid hsl(0,2%,50%);
box-shadow: 1px 6px 2px 0px rgba(0,0,0,0.06);

}

.mem-key:active {
background-image: linear-gradient(to bottom, hsl(40,4%,32%), hsl(40,4%,37%)  );
}

.numbers {
background-image: linear-gradient(to top, hsl(42,2%,90%), hsl(42,2%,95%) );
color: hsl(25, 5%, 35%);
border: 1px solid hsl(42,2%,70%);
box-shadow: 1px 6px 2px 0px rgba(0,0,0,0.04);
}

.numbers:active {
background-image: linear-gradient(to bottom, hsl(42,2%,90%), hsl(42,2%,95%) );

}

.op-key {
background-image: linear-gradient(to top, hsl(0,0%,55%), hsl(0,0%,60%) );
color: #FEFCF7;
border: 1px solid hsl(0,2%,50%);
box-shadow: 1px 6px 2px 0px rgba(0,0,0,0.06);
}

.op-key:active {
background-image: linear-gradient(to bottom, hsl(0,0%,55%), hsl(0,0%,60%) );
}

.eq {
background-image: linear-gradient(to top, hsl(13,85%,65%), hsl(13,85%,71%) );
color: #FEFCF7;
border: 1px solid hsl(23,3%,56%); 
box-shadow: 1px 6px 2px 0px rgba(0,0,0,0.06);
position: absolute;
bottom: 0px;
right:  0px;
}

.eq:active {
background-image: linear-gradient(to bottom, hsl(13,85%,65%), hsl(13,85%,71%) );
}

</style>

<div class="calculator">
    <div class="wrapper">
      <div class="logo">FCC Calculator</div>
      <div class="display">
        <div id="mem-indicator"></div>
        <input id="display" value="0" disabled=true></input>
      </div>
      <div class="buttons">
        <button class="mem-key">mc</button>
        <button class="mem-key">m+</button>
        <button class="mem-key">m-</button>
        <button class="mem-key">mr</button>
        <button class="op-key" id="clear-all">c</button>
        <button class="op-key" id="plus-min">&#177;</button>
        <button class="op op-key">&#247;</button>
        <button class="op op-key">&#215;</button>
        <button class="numbers">7</button>
        <button class="numbers">8</button>
        <button class="numbers">9</button>
        <button class="op op-key">&#8722;</button>
        <button class="numbers">4</button>
        <button class="numbers">5</button>
        <button class="numbers">6</button>
        <button class="op op-key">&#43;</button>
        <button class="numbers">1</button>
        <button class="numbers">2</button>
        <button class="numbers">3</button>
        <button class="numbers" id="double-width-btn">0</button>
        <button class="numbers">.</button>
      </div>
      <button class="eq op" id="double-height-btn">=</button>
      <div class="clearfix"></div>
    </div>
  </div>

  <script>
    var curVal, prevVal, pressedOp, newInputToggle, display, storedOp, doTheMath, ans, displayLength, mem;
curVal = prevVal = storedOp, calcActive = null;
newInputToggle = true;
display = $('#display');
displayLength = 10;
mem = 0;

$(".numbers").click(function() {
  if (newInputToggle) {
    display.val('');
    newInputToggle = false;
    calcActive = true;
    storedOp = pressedOp;
  }

  if (display.val().length < 10 && ($(this).text() !== '.' || (display.val().match(/\./g) || []).length < 1)) {
    display.val((display.val() + $(this).text())
      .replace(/^0*\./, '0.'))
  }
});

$('.op').click(function() {
  pressedOp = $(this).text()
  newInputToggle = true;
  if (!prevVal) {
        prevVal = parseFloat(display.val(), 10);
    calcActive = false;
  } 
  
  else if (calcActive) {
    curVal = parseFloat(display.val(), 10);
    ans = doTheMath[storedOp](prevVal, curVal)
    display.val(truncateAns(ans));
    calcActive = false;
    

    if (pressedOp === '=') {
      prevVal = null;
    } else {
      prevVal = parseFloat(display.val(), 10);
    }
  }
});

doTheMath = {
  '\u002B': function(a, b) {
    return a + b;
  },
  '\u2212': function(a, b) {
    return a - b;
  },
  '\u00D7': function(a, b) {
    return a * b;
  },
  '\u00F7': function(a, b) {
    return a / b;
  },
  '=': function(a, b) {
    return b;
  }
};

$('#clear-all').click(function() {
  curVal = prevVal = storedOp = null;
  newInputToggle = true;
  display.val('0');
});

$('.mem-key').click(function(){
  var pressedmem = $(this).text();
 switch (pressedmem) {     
    case 'm+':
      mem += parseFloat(display.val(),10);
      newInputToggle = true;
      break;
    case 'm-':
      mem -= parseFloat(display.val(),10);
      newInputToggle=true;
      break;
    case 'mc':
      mem = 0;
      break;
    case 'mr':
      display.val(mem);
      newInputToggle=true;
      calcActive = true;
      storedOp = pressedOp;
  }
  
  if (mem) {
    $('#mem-indicator').text('M');
  } else {
    $('#mem-indicator').text('');
  }
});

$('#plus-min').click(function(){
  display.val(0 - display.val())
  
  console.log(display.val());

});

function truncateAns(num) {
  if (num === Infinity){
    return '8008135'
  } else if (num > Math.pow(10, displayLength - 1)) {
    return num.toExponential(displayLength - 5).toString().
    replace(/\.0+e/, 'e');
  } else if (num.toString().length >= displayLength) {
    return num.toFixed(displayLength - Math.round(num).toString().length - 1).
    toString().
    replace(/\.0+e/, 'e');
  } else {
    return num;
  }
}
  </script>

@endsection