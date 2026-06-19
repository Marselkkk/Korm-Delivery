<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        title?: string,
        desc?: string,
        text?: string,
        tag?: 'feedback' | 'top' | 'useful',
        image?: string
    }>(),
    {
        tag: 'feedback'
    })

    const tagMap = {
        feedback: 'фидбек',
        top: 'топ',
        useful: 'полезное'
    }
</script>

<template>
    <div class="news-card">
        <div class="news-card__image-block">
            <img :src="image ? image : '/images/news-stub.jpg'" alt="news-item-image">
            <div class="news-card__tag"
            :data-tag="props.tag">
                {{ tagMap[props.tag] }}
            </div>
        </div>
        <div class="news-card__title-block">
            <div class="news-card__title-block__title">
                {{ title }}
            </div>
            <div class="news-card__title-block__desc">
                {{ desc }}
            </div>
        </div>
    </div>
</template>

<style lang="scss">
    .news-card {
        @include df_fdc;
        gap: 1.125rem;
        padding: 0.5625rem 0.875rem 0.875rem;
        background-color: #fff;
        &__image-block {
            position: relative;
            max-height: 25.125rem;
            aspect-ratio: 35.75 / 25.125;
            height: 100%;
            img {
                @include image_cover;
            }
        }
        &__tag {
            position: absolute;
            top: .75rem;
            left: .75rem;
            padding: .75rem .5rem;
            border-radius: 1.625rem;
            color: #fff;
            @include manrope;
            font-weight: 300;
            font-size: 0.9375rem;
            &[data-tag="feedback"] {
                background-color: #0063E4;
            }
            &[data-tag="top"] {
                background-color: #E49C00;
            }
            &[data-tag="useful"] {
                background-color: #04C404;
            }
        }
        &__title-block {
            @include df_fdc;
            gap: .5rem;
            @include manrope;
            &__title {
                color: #000;
                font-weight: 800;
                font-size: 1.5rem;
            }
            &__desc {
                color: #808080;
                font-weight: 200;
                font-size: 0.9375rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
    }
</style>