var dice = {
    sides: 6,
    roll: function () {
      var randomNumber = Math.floor(Math.random() * this.sides) + 1;
      return randomNumber;
    }
  }



  //Prints dice roll to the page
  
  function printNumber() {
      if (randomNumber == 1) {
        document.getElementsByClassName("cube")[0].style.animation = "spinCube1 2s linear";
      }
  }

  var button = document.getElementById('button');
  
  button.onclick = function() {
    printNumber;
  };
  
  