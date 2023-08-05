<template>
    <div class="row">
        <div class="example-2 card">
            <div class="wrapper">
                <div class="header">
                    <div class="date">
                        <h1>{{  price }} </h1>
                    </div>
                </div>
                <div class="data">
                    <div class="content">
                        <h1 class="title">{{ title }}</h1>
                        <p class="text"> {{ description }} </p>
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import './card.scss'

export default {
    props: ['price', 'title', 'description']
}

</script>
