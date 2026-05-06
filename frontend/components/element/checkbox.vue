<script lang="ts" setup>
    const props = defineProps<{
        counter?: string,
        size?: 'small' | 'basic',
        name?: string,
        id?: string,
    }>();
</script>

<template>
    <label :for="id || 'custom-checkbox-id'" 
    class="custom-checkbox"
    :data-size="size || 'basic'">
        <input type="checkbox" 
        :id="id || 'custom-checkbox-id'"
        :name="name || 'custom_checkbox_name'">
        <slot />
    </label>
</template>

<style lang="scss">
    .custom-checkbox {
        position: relative;
        @include df_ac;
        gap: .5rem;
        width: fit-content;
        cursor: pointer;
        font-size: 2rem;
        font-weight: 700;
        @include manrope;
        color: #181818;
        input {
            opacity: 0;
            display: none;
        }
        &[data-size="basic"] {
            &::before {
                height: 3.3125rem;
                aspect-ratio: 1;
                border: 1px solid #181818;
                border-radius: .5rem;
            }
            &::after {
                left: 8px;
                height: 2.6875rem;
                width: 2.4375rem;
                aspect-ratio: 1;
            }
        }
        &::before {
            content: '';
            display: block;
        }
        &::after {
            content: '';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-image: url("data:image/svg+xml,%3Csvg%20width%3D%2243%22%20height%3D%2239%22%20viewBox%3D%220%200%2043%2039%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M41.7318%200.582236C43.1044%201.55694%2043.4115%203.43138%2042.4133%204.7716L17.8412%2037.7617C17.3133%2038.474%2016.4974%2038.9145%2015.5951%2038.9894C14.6929%2039.0644%2013.8194%2038.7364%2013.1859%2038.1178L0.899858%2026.1214C-0.299953%2024.9499%20-0.299953%2023.0474%200.899858%2021.8758C2.09967%2020.7043%204.04816%2020.7043%205.24797%2021.8758L14.9904%2031.3886L37.4509%201.23829C38.4491%20-0.101933%2040.3688%20-0.401844%2041.7414%200.572863L41.7318%200.582236Z%22%20fill%3D%22black%22%2F%3E%3C%2Fsvg%3E");
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            opacity: 0;
            @include transition(opacity);
        }
        &:has(input:checked) {
            &::after {
                opacity: 1;
            }
        }
    }
</style>