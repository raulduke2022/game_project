<template>
    <div class="row">
        <div class="example-2 card">
            <div class="wrapper">
                <div class="header">
                    <div class="date">
                        <h1>{{ price }} RUB </h1>
                    </div>
                </div>
                <div class="image" :style="imagePath ? `background: url(${imagePath}) center / cover no-repeat;` : 'background:transparent' " ></div>
                <div class="data">
                    <div class="content">
                        <h1 class="title">{{ title }}</h1>
                        <p class="text"> {{ introduction }} </p>
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import '../../../scss/gamecard/card.scss'

export default {
    computed: {
        imagePath()
        {
            if (this.image.length) {
                return this.image[0].path
            }
        }
    },
    props: ['price', 'title', 'introduction', 'image']
}

</script>

<style>

.image:hover, image:after {
    transition: opacity 0.3s ease;
}


.wrapper {
    border: 2px solid #ffa300;
}

.wrapper:hover {
    border: 2px solid yellow;
}

.image {
    display: inline;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 4;
    transition: opacity 0.3s ease;
}

.image:hover, image:hover:after {
    opacity: 0.05;
}

</style>
