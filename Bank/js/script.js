document.getElementById('buttonStep1Next').onclick = function(e){
  document.getElementById('step1').classList.remove('active');
  document.getElementById('step1').classList.add('completed');
  document.getElementById('step2').classList.add('active');
  document.getElementById('PersonalInformation').style.display = 'none';
  document.getElementById('personalInfo').style.display = 'block'; 
}

document.getElementById('buttonStep2Back').onclick = function(e){
  document.getElementById('step2').classList.remove('active');
  document.getElementById('step2').classList.remove('completed');
  document.getElementById('step1').classList.add('active');
  document.getElementById('personalInfo').style.display = 'none';
  document.getElementById('PersonalInformation').style.display = 'block';  
}

document.getElementById('buttonStep2Next').onclick = function(e){
  document.getElementById('step2').classList.remove('active');
  document.getElementById('step2').classList.add('completed');
  document.getElementById('step3').classList.add('active');
  document.getElementById('personalInfo').style.display = 'none';
  document.getElementById('professionalInfo').style.display = 'block';  
}

document.getElementById('buttonStep3Back').onclick = function(e){
  document.getElementById('step3').classList.remove('active');
  document.getElementById('step2').classList.remove('completed');
  document.getElementById('step2').classList.add('active');
  document.getElementById('professionalInfo').style.display = 'none';
  document.getElementById('personalInfo').style.display = 'block'; 
}

document.getElementById('buttonStep3Next').onclick = function(e){
  alert('Registration completed!!') 
}