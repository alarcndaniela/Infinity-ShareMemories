/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles
// ..
AOS.init();


document.getElementById("profile_image").onchange = function() {
    document.getElementById("form").submit();
};
document.getElementById("file").onchange = function() {
    document.getElementById("feed-form").submit();
};


const file = document.querySelector('#file');
file.addEventListener('change', (e) => {
  // Get the selected file
  const [file] = e.target.files;
  // Get the file name and size
  const { name: fileName, size } = file;
  // Convert size in bytes to kilo bytes
  const fileSize = (size / 1000).toFixed(2);
  // Set the text content
  const fileNameAndSize = `${fileName} - ${fileSize}KB`;
  document.querySelector('.file-name').textContent = fileNameAndSize;
});


let inputCopyGroups = document.querySelectorAll('.input-group-copy');

for (let i = 0; i < inputCopyGroups.length; i++) {
  let _this = inputCopyGroups[i];
  let btn = _this.getElementsByClassName('btn')[0];
  let input = _this.getElementsByClassName('form-control')[0];

  input.addEventListener('click', function(e) {
    this.select();
  });
  btn.addEventListener('click', function(e) {
    let input = this.parentNode.parentNode.getElementsByClassName('form-control')[0];
    input.select();
  });
}
