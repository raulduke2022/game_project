<template>
    <div class="wrapper">
        <form class="form">
            <div class="pageTitle title">{{ title }}</div>
            <div class="secondaryTitle title">Заполните данные, пожалуйста.</div>
            <input type="text" class="name formEntry" placeholder="Имя" />
            <input type="text" class="name formEntry" placeholder="Фамилия" />
            <input type="text" class="name formEntry" placeholder="Электронная почта"/>
            <input type="checkbox" class="termsConditions" value="Term">
            <label style="color: grey" for="terms"> I Accept the <span style="color: #0e3721">Terms of Use</span> & <span style="color: #0e3721">Privacy Policy</span>.</label><br>
            <game-button class="button">Купить</game-button>
        </form>
    </div>
</template>

<script>
import GameButton from "@/components/ui/GameButton.vue";
export default {
    props: ['title'],
    components: {
        GameButton
    }
}
</script>

<style>
body {
}

#title-Tag-Line {
    font-size: 20px;
}
/* .card-item__bg{
  width: 150px;
  margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;
  display: block;
  position: relative;
  margin: 30px auto;
  transform: translate(0px, 50px);
  z-index: 5;
} */

/* form animation starts */
.form {
    background: #fff;
    box-shadow: 0 30px 60px 0 rgba(90, 116, 148, 0.4);
    border-radius: 5px;
    max-width: 680px;
    min-width: 480px;
    margin-left: auto;
    margin-right: auto;
    padding-top: 5px;
    padding-bottom: 5px;
    left: 0;
    right: 0;
    border: 5px solid yellow;
    /*   z-index: 1; */
}
::-webkit-input-placeholder {
    font-size: 1.3em;
}

.title{
    display: block;
    font-family: sans-serif;
    margin: 10px auto 5px;
    width: 300px;
}
.termsConditions{
    margin: 0 auto 5px 80px;
}

.pageTitle{
    font-size: 2em;
    font-weight: bold;
}
.secondaryTitle{
    color: grey;
}

.name {
    background-color: #ebebeb;
    color: green;
}

.email {
    background-color: #ebebeb;
    height: 2em;
}


.message {
    background-color: #ebebeb;
    overflow: hidden;
    height: 10rem;
}

.message:hover {
    border-bottom: 5px solid #0e3721;
    height: 12em;
    width: 380px;
    transition: ease 0.5s;
}

.formEntry {
    display: block;
    margin: 30px auto;
    min-width: 300px;
    padding: 10px;
    border-radius: 2px;
    border: none;
    transition: all 0.5s ease 0s;
}

.submit {
    width: 200px;
    color: white;
    background-color: #0e3721;
    font-size: 20px;
}

.submit:hover {
    box-shadow: 15px 15px 15px 5px rgba(78, 72, 77, 0.219);
    transform: translateY(-3px);
    width: 300px;
    border-top: 5px solid #0e3750;
    border-radius: 0%;
}


.button {
    display: block;
    margin: 30px auto;
    min-width: 300px;
    padding: 10px;
    border-radius: 2px;
    border: none;
    transition: all 0.5s ease 0s;
    font-size: 20px;
}


</style>
