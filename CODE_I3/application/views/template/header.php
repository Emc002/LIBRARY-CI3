<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>

  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/dashboardstyle11.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.5.0.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>

  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
   
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,100,0,0" />
 <style>

body {
  background-color: #12273b;
}


.side {
  height: 100%;
  width: 300px;
  position: fixed;
  overflow-x: hidden;
  z-index: 1;
  top: 0rem;
  left: 0rem;
/* From https://css.glass */
background: rgba(18, 39, 59, 0.57);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(12.5px);
-webkit-backdrop-filter: blur(12.5px);
border: 1px solid rgba(18, 39, 59, 1);
  padding-top: 20px;
  border-right: 1px solid #f2f2f25f;
  text-align: left;
  padding: 0rem 1rem 0rem 1rem;


}

.side a {
  text-transform: capitalize;
  text-decoration: none;
  font-size: 20px;
  color: rgba(255, 255, 255, 0.833);

  margin-top: 2rem;
}

.sidemenu {
  margin-top: 2rem;
  height: 3rem;
  border-radius: 1rem;
  list-style: none;
  height: 8vh;
  transition: 350ms ease-out;
}


.sidemenu:hover {
  margin-top: 2rem;
  background-color: #03a1f8;
  height: 3rem;
  border-radius: 1rem;
  list-style: none;
  height: 8vh;
}

.stayIn{
  margin-top: 2rem;
  background-color: #03a1f8;
  height: 3rem;
  border-radius: 1rem;
  list-style: none;
  height: 8vh;
}

.header {
  margin-bottom: 2rem;
  margin: 1rem 2rem 3rem 0.6rem;
  height: 7vh;
  text-align: center;
}


ul {
  padding: 0.5rem 0rem 1rem 2rem;
 

}



.two {
  /* width: 100%;
  height: auto;
  background-color: #6dccec; */
  margin: 1.9rem 2rem 5rem 0.6rem;
  height: 5vh;

}

.container {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
}

.rowside {
  padding: 0rem 1rem 0rem 1rem;
}

h1,
h4 {
  color: #f1f1f1f1;
  margin: 0;
}

.boxExport{
  background-color: #03a1f8;
  height: 100%;
  box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
  padding: 1rem 2rem 1rem 2rem;
  border-radius: 1rem;
  margin-top: 4rem;
}

.box {
  background-color: #03a1f8;
  height: 60vh;
  box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
  padding: 1rem 2rem 1rem 2rem;
  border-radius: 1rem;
}

.box2 {
  background-color: #12273b;
  height: 15vh;
  box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
  padding: 1rem 2rem 0rem 2rem;
  margin-top: 2rem;
  border-radius: 1rem;
}

.box21 {
  background-color: #12273b;
  height: 26vh;
  box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
  padding: 1rem 2rem 0rem 2rem;
  margin-top: 2rem;
  border-radius: 1rem;
}

.box3 {
  background-color: #7464fb;
  height: 45vh;
  box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
  padding: 1rem 2rem 0rem 2rem;
  margin-top: 2rem;
  margin-left: 7.7rem;
  border-radius: 1rem;
}

.box4 {
  background: linear-gradient(150deg, rgba(18,39,59,1) 70%, rgba(26,213,255,1) 95%, rgba(26,213,255,1) 87%);
  height: 50vh;
  box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
  padding: 7rem 2rem 0rem 7rem;
  margin-top: 3.7rem;
  border-radius: 1rem;

}

.box5 {
  height: 50vh;
  padding: 1rem 2rem 0rem 2rem;
  margin-top: 2rem;
  border-radius: 1rem;
}

.box6 {
  background-color: #03a1f8;
  height: 100vh;
  box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
  padding: 1rem 2rem 0rem 2rem;
  border-radius: 1rem;
  margin-top: 2rem;
}

.setting {
  padding: 0rem 3rem 0rem 6rem;
}

.setting1 {
  padding: 0rem 1.5rem 0rem 1.5rem;

}

.divtwo {
  border-right: 1px solid #f2f2f286;
  height: 100%;
}

.sideheader{
  padding: 2rem 0rem 0rem 0rem;
}

.logout{
  text-transform: capitalize;
  text-decoration: none;
  font-size: 25px;
  color: rgba(255, 255, 255, 0.833);
}

::-webkit-scrollbar {
  width: 12px;
}

::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(200,200,200,1);
  border-radius: 10px;
}

::-webkit-scrollbar-thumb {
  border-radius: 10px;
  background-color:#fff;
  -webkit-box-shadow: inset 0 0 6px rgba(90,90,90,0.7);
}

.boxcreate{
  background-color: #03a1f8;
  height: 100%;
  width: 40vw;
  margin-left: 35rem;
  box-shadow: -0.7rem 2rem 1rem 1rem rgba(0, 0, 0, 0.47);
  padding: 1rem 5rem 2rem 5rem;
  border-radius: 1rem;
}

.f1{
  margin-top: 2rem;
}

.headtitle{
  font-size: 30px;
  font-weight: bolder;
}

.psion{
  margin-top: 3rem;
  margin-bottom: 3rem;

  justify-items: center;
  color: #fff;

}

.stockstyle{
  color: #ffffff;
  text-decoration: none;
  font-size: 3rem;
  font-weight: bolder;
  text-align: center;
}


.noxy:hover .nox{
filter: blur(0px);
transform: scale(.98);
}

.noxy:hover .nox:hover{
  transform: scale(1);
  filter: blur(0px);

}


.yoxy:hover .yox{
  filter: blur(1px);
  opacity: .5;
  transform: scale(.98);
  }
  
  .yoxy:hover .yox:hover{
    transform: scale(1);
    filter: blur(0px);
    opacity: 1;
  }

  .tgl{
    color: #ffffff;
    padding: 0.3rem 2rem 2rem 2.6rem;
    font-size: 1.8rem;
    font-weight: bolder;
  }

  .librarianTable{
    margin-top: 2rem;
  }

  .account-img{
    height: 3rem;
    width: 3rem;
    border-radius: 2rem;
    display: inline-block;
  }

  .navigation {
  width: 100%;
  background-color: black;
}

.logout {
  font-size: .8em;
  font-family: 'Oswald', sans-serif;
  position: absolute;
    right: 0.5rem;
    top: 1.7rem;
  overflow: hidden;
  letter-spacing: 3px;
  opacity: 0;
  transition: opacity .45s;
  -webkit-transition: opacity .35s;
  
}

.button {
	text-decoration: none;
  display: grid;
  grid-template-columns: repeat(1);
  position: absolute;
  top: 1rem;
  right: 1rem;
	float: right;
  padding: 12px;
  margin: 15px;
  color: white;
  width: 80px;
  height: 75px;
  transition: width .35s;
  -webkit-transition: width .35s;
  overflow: hidden
}

.button:hover {
  width: 180px;
  background: rgba(255,255,255,0.05);
    backdrop-filter: blur(10px);
    border-top: 1px solid rgba(255,255,255,0.2);
    border-left: 1px solid rgba(255,255,255,0.2);
    box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
  border-radius: 3rem;
} 

a:hover .logout{
  opacity: .9;
}

a {
  text-decoration: none;
}

p{
  color: white;
}

    .tabavatar{
      width: 5rem;
      height: 5rem;
      border-radius: 2.5rem;
    }

    .coverbook{
      width: 8rem;
      height: 10rem;
      border-radius: 0.3rem;
    }
 </style>
</head>
<body>
