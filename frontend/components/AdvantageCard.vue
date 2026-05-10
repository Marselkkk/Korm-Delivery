<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        title?: string,
        color?: 'green' | 'yellow',
        decoration?: 'green' | 'grey' | 'yellow',
        sub_title?: string,
        desc?: string
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
        <div class="advantage-card__title-block">
            <span>
                {{ sub_title }}
            </span>
            {{ desc }}
        </div>

        <div class="advantage-card__decoration"
        data-decoration-color="green"
        v-if="decoration === 'green'">
            <svg width="139" height="115" viewBox="0 0 139 115" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.54" d="M0 15.4667C0 6.93583 6.92587 0 15.4444 0H84.9444C93.463 0 100.389 6.93583 100.389 15.4667V23.2H112.624C116.726 23.2 120.66 24.8192 123.556 27.7192L134.487 38.6667C137.383 41.5667 139 45.5058 139 49.6142V85.0667C139 93.5975 132.074 100.533 123.556 100.533H122.759C120.249 109.451 112.045 116 102.319 116C92.5943 116 84.4135 109.451 81.8797 100.533H57.1203C54.6106 109.451 46.4057 116 36.6806 116C26.9554 116 18.7747 109.451 16.2408 100.533H15.4444C6.92587 100.533 0 93.5975 0 85.0667V15.4667ZM123.556 61.8667V49.6142L112.624 38.6667H100.389V61.8667H123.556ZM46.3333 94.7333C46.3333 89.3925 42.0137 85.0667 36.6806 85.0667C31.3474 85.0667 27.0278 89.3925 27.0278 94.7333C27.0278 100.074 31.3474 104.4 36.6806 104.4C42.0137 104.4 46.3333 100.074 46.3333 94.7333ZM102.319 104.4C107.653 104.4 111.972 100.074 111.972 94.7333C111.972 89.3925 107.653 85.0667 102.319 85.0667C96.9863 85.0667 92.6667 89.3925 92.6667 94.7333C92.6667 100.074 96.9863 104.4 102.319 104.4Z" fill="#0F9444"/>
            </svg>
        </div>
        <div class="advantage-card__decoration"
        data-decoration-color="grey"
        v-else-if="decoration === 'grey'">
            <svg width="65" height="87" viewBox="0 0 65 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.0168573 31.7233C0.0168573 14.1964 14.5144 0 32.3834 0C50.2525 0 64.75 14.1964 64.75 31.7233C64.75 51.79 44.4872 75.8431 36.0247 85.0102C34.0355 87.1633 30.7145 87.1633 28.7253 85.0102C20.2628 75.8431 0 51.79 0 31.7233H0.0168573ZM32.3834 43.0602C38.3342 43.0602 43.1723 38.2327 43.1723 32.2951C43.1723 26.3575 38.3342 21.5301 32.3834 21.5301C26.4327 21.5301 21.5946 26.3575 21.5946 32.2951C21.5946 38.2327 26.4327 43.0602 32.3834 43.0602Z" fill="#827E77"/>
            </svg>
        </div>
        <div class="advantage-card__decoration"
        data-decoration-color="yellow"
        v-else>
            <svg width="112" height="98" viewBox="0 0 112 98" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100.643 44.7657C102.588 46.9619 105.934 47.4458 108.458 45.7894C111.206 43.9654 111.954 40.2617 110.122 37.5258L101.148 24.1254C100.625 23.3437 99.9143 22.6923 99.073 22.227L61.59 1.49359C57.9819 -0.497862 53.5887 -0.497862 49.9619 1.49359L12.4976 22.2084C11.4881 22.7667 10.6842 23.5856 10.1421 24.5907L1.07513 41.3226C-1.28041 45.6777 0.364728 51.0937 4.7393 53.4388L10.9086 56.733V66.653C10.9086 70.9337 13.2267 74.898 16.9657 77.0197L49.8684 95.5756C53.5326 97.6415 58.0006 97.6415 61.6648 95.5756L94.5676 77.0197C98.3252 74.898 100.625 70.9523 100.625 66.653V44.7843L100.643 44.7657ZM55.776 42.9418L27.7151 27.4196L55.776 11.8975L83.8368 27.4196L55.776 42.9418ZM48.0176 52.2848L44.0357 60.8834L13.0398 44.3563L17.7882 35.5716L48.0176 52.2848Z" fill="#B98C4C"/>
            </svg>
        </div>
    </div>
</template>

<style lang="scss">
    .advantage-card {
        height: 26.5rem;
        aspect-ratio: 1 / 1;
        border-radius: 1.75rem;
        @include df_ac_jcc;
        position: relative;
        overflow: hidden;
        @include mobile {
            height: 10rem;
        }
        &__title {
            color: #000;
            font-size: 2rem;
            font-weight: 500;
            @include manrope;
            text-align: center;
            transition: opacity 0.3s ease, transform 0.3s ease;
            opacity: 1;
            transform: scale(1);
            @include mobile {
                font-size: .83rem;
            }
        }
        
        &__title-block {
            @include df_fdc_ac;
            gap: .875rem;
            color: #000;
            font-size: 1.5rem;
            font-weight: 500;
            @include manrope;
            text-align: center;
            position: absolute;
            opacity: 0;
            transform: scale(0.8);
            transition: opacity 0.3s ease, transform 0.3s ease;
            pointer-events: none;
        }

        &__decoration {
            position: absolute;
            transition: all 0.3s ease, transform 0.4s cubic-bezier(0.34, 1.2, 0.64, 1);
            opacity: 0;
            svg {
                @include wh-100;
            }
            &[data-decoration-color="green"] {
                bottom: 0;
                left: -10%;
                max-height: 7.25rem;
                aspect-ratio: 8.75 / 7.25;
            }
            &[data-decoration-color="grey"] {
                top: 0;
                right: 2.5rem;
                max-height: 5.375rem;
                aspect-ratio: 4rem / 5.375;
            }
            &[data-decoration-color="yellow"] {
                bottom: .75rem;
                right: 1.25rem;
                max-height: 6.1rem;
                aspect-ratio: 6.9375 / 6.1;
            }
        }
        
        &[data-color="yellow"] {
            background-color: #E6D3A3;
        }
        &[data-color="green"] {
            background-color: #A3B18A;
        }

        &:hover {
            .advantage-card__title {
                opacity: 0;
                transform: scale(0.8);
            }
            .advantage-card__title-block {
                opacity: 1;
                transform: scale(1);
            }
            .advantage-card__decoration {
                &[data-decoration-color="green"] {
                    left: 50%;
                    opacity: .54;
                }
            }
            .advantage-card__decoration {
                &[data-decoration-color="grey"] {
                    top: 77%;
                    opacity: 1;
                }
            }
            .advantage-card__decoration {
                &[data-decoration-color="yellow"] {
                    opacity: 1;
                    transform: rotate(360deg);
                }
            }
        }
    }
</style>