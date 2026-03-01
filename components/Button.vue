<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        color?: 'basic' | 'outline' | 'accent',
        size?: 'basic' | 'small' | 'large',
        link?: string
    }>(),
    {
        color: 'basic',
        size: 'basic'
    })
</script>

<template>
    <a class="button" 
    :data-color="props.color"
    :data-size="props.size"
    v-if="link"
    :href="link">
        <slot />
    </a>
    <button class="button" 
    :data-color="props.color"
    :data-size="props.size"
    v-else>
        <slot />
    </button>
</template>

<style lang="scss">
    .button {
        @include df_ac_jcc;
        width: fit-content;
        text-wrap: nowrap;
        cursor: pointer;
        @include transition(color, transform, border-color, background-color, border);

        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        &[data-color="outline"] {
            color: #fff;
            border-radius: 1rem;
            border: 1px solid #fff;
            &:hover {
                color: #e2e2e2;
                border: 1px solid #636363;
            }
        }
        &[data-color="accent"] {
            color: #fff;
            border-radius: 1.375rem;
            background-color: #CCBA4B;
            &:hover {
                background-color: #b3a443;
            }
        }
        &[data-size="basic"] {
            padding: .75rem 2rem;
            font-size: 1.5rem;
            font-weight: 400;
            @include onest;
        }
        &[data-size="small"] {
            padding: 1rem 1.5rem;
            font-size: 1.5rem;
            font-weight: 400;
            @include onest;
        }
        &[data-size="large"] {
            padding: 1.3125rem 3.375rem;
            font-size: 2rem;
            font-weight: 700;
            border-radius: 1rem;
            @include manrope;
        }
    }
</style>