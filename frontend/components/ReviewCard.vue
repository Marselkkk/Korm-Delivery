<script lang="ts" setup>
    const backendUrl = 'http://127.0.0.1:8000'

    const props = withDefaults(defineProps<{
        name?: string
        text?: string
        rating?: number
        avatar?: string
    }>(),
    {
    
    })
</script>

<template>
    <div class="review-card">
        <div class="review-card__avatar">
            <img :src="
                    avatar
                        ? `${backendUrl}/storage/${avatar}`
                        : '/images/avatar-stub.png'
                " alt="avatar-photo">
        </div>
        <div class="review-card__info-block">
            <div class="review-card__info-block__text">
                {{ text }}
            </div>
            <div class="review-card__info-block__profile">
                <div class="review-card__info-block__profile__name">
                    {{ name }}
                </div>
                <div class="review-card__info-block__profile__desc">
                    <span>Собака породы доберман</span>
                    <div class="review-card__info-block__profile__rating">
                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                        v-for="star in rating">
                            <path d="M8.71498 0.972444C8.9637 0.418125 9.08811 0.140965 9.26129 0.0556155C9.4117 -0.0185385 9.58832 -0.0185385 9.73873 0.0556155C9.91192 0.140965 10.0363 0.418125 10.285 0.972444L12.2661 5.38767C12.3397 5.55154 12.3765 5.63347 12.4334 5.69622C12.4837 5.75174 12.5453 5.79615 12.6139 5.82654C12.6916 5.86091 12.7814 5.87032 12.961 5.88915L17.8002 6.39654C18.4078 6.46023 18.7115 6.49208 18.8467 6.62932C18.9642 6.74852 19.0187 6.91545 18.9942 7.08049C18.9661 7.27046 18.7392 7.47356 18.2854 7.87987L14.6705 11.1161C14.5365 11.2361 14.4693 11.2962 14.4269 11.3693C14.3893 11.4341 14.3657 11.5059 14.3579 11.5802C14.349 11.6642 14.3677 11.7519 14.4052 11.9275L15.4148 16.6563C15.5416 17.25 15.605 17.5468 15.5154 17.7169C15.4375 17.8648 15.2946 17.9679 15.1291 17.9958C14.9385 18.0278 14.6739 17.8763 14.1446 17.573L9.92943 15.1578C9.773 15.0682 9.69479 15.0234 9.61164 15.0058C9.53804 14.9904 9.46198 14.9904 9.38838 15.0058C9.30523 15.0234 9.22702 15.0682 9.07059 15.1578L4.85541 17.573C4.3262 17.8763 4.0616 18.0278 3.871 17.9958C3.70543 17.9679 3.5625 17.8648 3.48468 17.7169C3.39509 17.5468 3.45846 17.25 3.58522 16.6563L4.59485 11.9275C4.63233 11.7519 4.65106 11.6642 4.64217 11.5802C4.63429 11.5059 4.6108 11.4341 4.5732 11.3693C4.53071 11.2962 4.46362 11.2361 4.32947 11.1161L0.714693 7.87987C0.260878 7.47356 0.0339644 7.27046 0.00575201 7.08049C-0.0187431 6.91545 0.0358446 6.74852 0.153314 6.62932C0.288553 6.49208 0.592325 6.46023 1.19987 6.39654L6.03905 5.88915C6.21866 5.87032 6.30845 5.86091 6.38611 5.82654C6.45481 5.79615 6.51633 5.75174 6.56667 5.69622C6.62356 5.63347 6.66032 5.55154 6.73386 5.38767L8.71498 0.972444Z" fill="#D0994E"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
    .review-card {
        display: flex;
        gap: 1.25rem;
        width: 100%;
        &__avatar {
            height: 7.8125rem;
            width: 7.8125rem;
            aspect-ratio: 1 / 1;
            img {
                @include image_cover;
            }
        }
        &__info-block {
            @include df_fdc;
            gap: 1.875rem;
            @include onest;
            color: #181818;
            &__text {
                font-size: 1.5rem;
                font-weight: 300;
            }
            &__profile {
                @include df_fdc;
                gap: 0.375rem;
                &__name {
                    font-size: 1.5rem;
                    font-weight: 500;
                }
                &__desc {
                    @include df_fdc;
                    gap: 0.1875rem;
                    span {
                        font-size: 1.5rem;
                        font-weight: 300;
                    }
                }
                &__rating {
                    @include df_ac;
                    svg {
                        width: 1.1875rem;
                        height: 1.125rem;
                    }
                }
            }
        }
    }
</style>