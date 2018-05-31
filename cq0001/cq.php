<?php
$N = 10;
$Capacity = $N+1;
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SQ</title>
  <script>
    var N = <?= $N ?>;
    var Capacity = <?= $Capacity ?>;
    var buffer = [];
    buffer.length = Capacity;
    for (var i=0;  i<Capacity; i++)
        buffer[i] = '.';
    var head = 0;
    var tail = 0;
    var idx = 0;
    function updateDisplay() {
      var id;
      for (var i=0; i<Capacity; i++) {
        id = document.getElementById('b'+i.toString());
        id.innerText = buffer[i];
        id = document.getElementById('h'+i.toString());
        if (i == head)
          id.innerText = 'v';
        else
          id.innerHTML = '&nbsp;';
        id = document.getElementById('t'+i.toString());
        if (i == tail)
          id.innerText = '^';
        else
          id.innerHTML = '&nbsp;';
        }
        document.getElementById('head').innerText = head.toString();
        document.getElementById('tail').innerText = tail.toString();
    }
    function updateStatus(str) {
        document.getElementById('status').innerText = str;
    }
    function Empty() {
        return head == tail;
    }
    function Full() {
        return (head + 1) % Capacity == tail;
    }
    function Push() {
        if (!Full()) {
            buffer[head] = idx++;;
            head = (head + 1) % Capacity;
            return true;
        }
        else
            return false;
    }
    function Front() {
        if (!Empty())
            return (buffer[tail]).toString();
        else
            return 'Empty!';
    }
    function Pop() {
        if (!Empty()) {
            tail = (tail + 1) % Capacity;
            return true;
        }
        else
            return false;
    }
  </script>
</head>
<body>
Head: <span id="head"></span><br>
Tail: <span id="tail"></span><br>
<table style="border:1px solid #AAA;" cellpadding="5px;" cellspacing="0px;">
  <tr>
    <?php
      for ($box = 0; $box < $Capacity; $box++) {
        ?><td id="h<?= $box ?>" style="border:1px solid #AAA;" width="20px;">&nbsp;</td><?php
      }
    ?>
  </tr>
</table>
<table border="1px;" cellpadding="5px;" cellspacing="0px;">
  <tr>
    <?php
    for ($box = 0; $box < $Capacity; $box++) {
      ?><td id="b<?= $box ?>" width="20px;">.</td><?php
    }
    ?>
  </tr>
</table>
<table style="border:1px solid #AAA;" cellpadding="5px;" cellspacing="0px;">
  <tr>
    <?php
    for ($box = 0; $box < $Capacity; $box++) {
      ?><td id="t<?= $box ?>" style="border:1px solid #AAA;" width="20px;">^</td><?php
    }
    ?>
  </tr>
</table>
<input type="button" value="Push" onclick="
var ret = Push();
updateDisplay();
if (!ret)
    updateStatus('Full!');
else
    updateStatus('');
">
<input type="button" value="Front" onclick="
updateStatus(Front());
">
<input type="button" value="Pop" onclick="
var ret = Pop();
updateDisplay();
if (!ret)
    updateStatus('Empty!');
else
    updateStatus('');
">
<br>
Status: <span id="status"></span>
<script>
    updateDisplay();
    updateStatus('');
</script>
</body>
</html>