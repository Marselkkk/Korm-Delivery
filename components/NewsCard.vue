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
                Наши клиенты делятся впечатлениями о доставке и корме
            </div>
            <div class="news-card__title-block__desc">
                Покупатели рассказали о своём опыте заказа: от быстрой доставки до качества корма, который с удовольствием едят их питомцы. В коротком интервью они поделились честным мнением, отметив удобство сервиса, свежесть продукции и заметные улучшения в самочувствии животных.
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