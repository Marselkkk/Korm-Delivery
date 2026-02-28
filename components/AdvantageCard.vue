<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        title?: string,
        color?: 'green' | 'yellow'
    }>(),
    {
        color: 'yellow'
    })
</script>

<template>
    <div class="advantage-card"
    :data-color="color">
        <div class="advantage-card__title">
            {{ title }}
        </div>
    </div>
</template>

<style lang="scss">
    .advantage-card {
        height: 26.5rem;
        aspect-ratio: 1 / 1;
        border-radius: 1.75rem;
        @include df_ac_jcc;
        &__title {
            color: #000;
            font-size: 2rem;
            font-weight: 500;
            @include manrope;
            text-align: center;
        }
        &[data-color="yellow"] {
            background-color: #E6D3A3;
        }
        &[data-color="green"] {
            background-color: #A3B18A;
        }
    }
</style>