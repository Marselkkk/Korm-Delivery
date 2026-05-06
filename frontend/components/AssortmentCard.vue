<script lang="ts" setup>

    const selected = ref<string | number | null>(null)
    const selected_sec = ref<string | number | null>(null)

    const options = [
        { label: 'Option 1', value: 1 },
        { label: 'Option 2', value: 2 },
        { label: 'Option 3', value: 3 }
    ]
    const options_sec = [
        { label: 'Option 1', value: 1 },
        { label: 'Option 2', value: 2 },
        { label: 'Option 3', value: 3 }
    ]

    const props = withDefaults(defineProps<{
        
    }>(),
    {
    
    })
</script>

<template>
    <div class="assortment-card">
        <div class="assortment-card__header">
            <span>Домашние животные</span>
            <a href="#">
                еще
            </a>
        </div>
        <div class="assortment-card__info-block">
            <ElementSelect v-model="selected" :options="options" placeholder="Собаки" />
            <ElementSelect v-model="selected_sec" :options="options_sec" placeholder="Кошки" />
        </div>
    </div>
</template>

<style lang="scss">
    .assortment-card {
        padding: 1.5rem .75rem;
        max-width: 16.875rem;
        background-color: #FFFBE3;
        &__header {
            @include df_jb_ac;
            @include manrope;
            font-size: 1rem;
            span {
                font-weight: 600;
                color: #181818;
            }
            a {
                font-weight: 300;
                color: #808080;
            }
        }
        &__info-block {
            @include df_fdc;
            gap: .75rem;
            padding: .75rem;
        }
    }
</style>