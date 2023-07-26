<template>
    <div class="card">
        <div class="image"></div>
        <div class="title"> {{ title }} </div>
        <div class="price"> {{ price }} </div>
    </div>
</template>

<style scoped>
.card {
    background-color: white;
    cursor: pointer;
    display: grid;
    grid-template-areas:
        "image header"
        "image price";
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: 1fr 0.3fr;
    grid-column-gap: 1rem;
    border-radius: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
    padding: 0.8rem;
    margin: 1rem 1rem;
    height: 10rem;
    max-width: 40rem;
    row-gap: 1rem;
    border: springgreen solid 3px;
}

.card:hover {
    border: darkgreen solid 3px;
    background-color: powderblue;
}

.price {
    background-color: #5dbea3;
    grid-area: price;
    display: flex;
    justify-self: end;
    border: black 2px solid;
    border-radius: 10px;
}

.title {
    word-break: break-word;
    grid-area: header;
    display: flex;
    justify-self: center;
    overflow: hidden;
}

.image {
    margin-left: 0.1rem;
    border-radius: 5px;
    border: black 2px solid;
    grid-area: image;
    background-image: url("../../gta.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}


</style>



<script>
export default {
    props: ['price', 'title']
}
</script>
