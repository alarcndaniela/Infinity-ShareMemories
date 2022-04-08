require('./bootstrap');

// Animation library initialization
import AOS from 'aos';
import 'aos/dist/aos.css';
AOS.init();

// Submit avatar form on change
document.getElementById("profile_image").onchange = function() {
    document.getElementById("form").submit();
};
document.getElementById("file").onchange = function() {
    document.getElementById("feed-form").submit();
};

// Copy button functionality
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
    try {
        var success = document.execCommand('copy');
        console.log('Copying ' + (success ? 'Succeeded' : 'Failed'));
    } catch (err) {
        console.log('Copying failed', err);
    }
  });
}
