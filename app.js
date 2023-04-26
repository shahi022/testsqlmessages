// Save message to local storage
function saveMessage() {
    var message = document.getElementById("message").value;
    localStorage.setItem("message", message);
    document.getElementById("status").innerHTML = "Message saved!";
  }
  
  // Show old messages from local storage
  function showOldMessages() {
    var message = localStorage.getItem("message");
    if (message === null) {
      document.getElementById("status").innerHTML = "No old messages found!";
    } else {
      document.getElementById("status").innerHTML = "Old message: " + message;
    }
  }
  
  // Submit message to MySQL database
function submitMessage() {
  var message = document.getElementById("message").value;
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      document.getElementById("status").innerHTML = "Message submitted!";
    }
  };
  xhr.open("POST", "https://sql211.byetcluster.com/submit.php", true); // Update URL
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("message=" + message);
}

  
