$(document).ready(function(){
    $('#img_01').imageLens(); // default initialization
    $('#img_02').imageLens({ lensSize: 200 }); // set lens size
    $('#img_03').imageLens({ lensSize: 200, imageSrc: 'data_images/img5.jpg' }); // lens size + custom image
    $('#img_04').imageLens({ lensSize: 200, borderSize: 8, borderColor: '#fofof' }); // new border size and color
});