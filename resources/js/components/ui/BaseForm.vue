<template>
    <div class="wrapper">
        <form class="form">
            <div class="pageTitle title">{{ title }}</div>
            <div class="secondaryTitle title">Заполните данные, пожалуйста.</div>
            <!--            <input type="text" class="name formEntry" placeholder="Имя"/>-->
            <!--            <input type="text" class="name formEntry" placeholder="Фамилия"/>-->
            <input type="email" class="name formEntry" placeholder="Электронная почта"
                   :class="{ 'error': errors.email }" v-model="email"/>
            <div v-if="errors.email" class="errorText title">{{ errors.email }}</div>
            <label style="color: grey;" class="title" for="terms"> <input type="checkbox" class="" value="Term"
                                                                          v-model="termsAgreed"> Я принимаю условия
                пользовательского соглашения </label> <br>
            <span v-if="errors.termsAgreed" class="errorText title">{{ errors.termsAgreed }}</span>
            <div class="title" style="display: flex; justify-content: center; font-size: 1.5rem; box-shadow: 2px 2px 2px 2px green">{{ price }}
                {{ curr }} </div>
            <game-button class="button" @click="makePayment">Купить</game-button>
        </form>
    </div>
</template>

<script>
import GameButton from "@/components/ui/GameButton.vue";

export default {
    emits: ['makePayment'],
    data() {
        return {
            email: 'raul@gmail.com',
            termsAgreed: true,
            errors: {},
        }
    },
    methods: {
        makePayment() {
            this.errors = {};
            if (!this.email) {
                this.errors.email = 'Email не заполнена';
            } else if (!/^[^@]+@\w+(\.\w+)+\w$/.test(this.email)) {
                this.errors.email = 'Email неверно заполнена';
            }

            if (!this.termsAgreed) {
                this.errors.termsAgreed = 'Необходимо принять условия';
            }

            if (!this.errors.email && !this.errors.termsAgreed) {
                this.$emit('makePayment', this.email)
            }
        }
    },
    props: ['title', 'price', 'curr'],
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
    box-shadow: 0px 15px 60px 0px rgb(37 87 149 / 40%);
    max-width: 680px;
    min-width: 480px;
    margin-left: auto;
    margin-right: auto;
    padding-top: 5px;
    padding-bottom: 5px;
    left: 0;
    right: 0;
    /*   z-index: 1; */
}

::-webkit-input-placeholder {
    font-size: 1.3em;
}

.title {
    display: block;
    font-family: sans-serif;
    margin: 10px auto 5px;
    padding-bottom: 5px;
    padding-top: 5px;
    width: 300px;
}

.termsConditions {
    margin: 0 auto 5px 80px;
}

.pageTitle {
    font-size: 2em;
    font-weight: bold;
}

.secondaryTitle {
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

.error {
    border: 1px solid red;
}

.errorText {
    color: red;
}


</style>
