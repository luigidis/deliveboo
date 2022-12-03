<template>
    <div>
        <div class="loader">
            <SvgBoolean />
        </div>
    </div>
</template>
            
        

<script>
import SvgBoolean from './svgs/SvgBoolean.vue';

export default {
    data() {
        return {};
    },
    components: { SvgBoolean }
}
</script>

<style lang="scss" scoped>
@import '../../sass/variables';

.loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #4c5355bb;
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    z-index: 999999999;
}

.loader>* {
    animation: loading 0.75s ease infinite;
}
    
@keyframes loading {
    from {
        transform: rotate(0turn);
    }

    to {
        transform: rotate(1turn);
    }
}
    
   
    
    

</style>