<script lang="ts" setup>
    const props = defineProps<{
        modelValue: number
    }>()

    const emit = defineEmits([
        'update:modelValue'
    ])

    const increaseInput = () => {
        emit('update:modelValue', props.modelValue + 1)
    }

    const decreaseInput = () => {
        emit(
            'update:modelValue',
            props.modelValue > 1
                ? props.modelValue - 1
                : 1
        )
    }

    const updateValue = (event: Event) => {

        const input =
            event.target as HTMLInputElement

        const value = parseInt(input.value)

        emit(
            'update:modelValue',
            isNaN(value) ? 1 : value
        )
    }

</script>

<template>
    <div class="counter">
        <div class="counter_button"
        @click="decreaseInput">
            <svg width="24" height="3" viewBox="0 0 24 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 1.5C0 0.670312 0.766071 0 1.71429 0H22.2857C23.2339 0 24 0.670312 24 1.5C24 2.32969 23.2339 3 22.2857 3H1.71429C0.766071 3 0 2.32969 0 1.5Z" fill="#000000"/>
            </svg>
        </div>
        <label :for="id || 'counter-label-id'" class="counter__label">
            <input :id="id || 'counter-label-id'" 
            :name="name || 'counter_label_name'"
            type="number"
            :value="modelValue"
            @input="updateValue">
        </label>
        <div class="counter_button"
        @click="increaseInput">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.7143 1.71429C13.7143 0.766071 12.9482 0 12 0C11.0518 0 10.2857 0.766071 10.2857 1.71429V10.2857H1.71429C0.766071 10.2857 0 11.0518 0 12C0 12.9482 0.766071 13.7143 1.71429 13.7143H10.2857V22.2857C10.2857 23.2339 11.0518 24 12 24C12.9482 24 13.7143 23.2339 13.7143 22.2857V13.7143H22.2857C23.2339 13.7143 24 12.9482 24 12C24 11.0518 23.2339 10.2857 22.2857 10.2857H13.7143V1.71429Z" fill="black"/>
            </svg>
        </div>
    </div>
</template>

<style lang="scss">
    .counter {
        @include df_ac;
        gap: .25rem;
        padding: .375rem;
        width: fit-content;
        &__label {
            width: 2rem;
            input {
                @include manrope;
                font-weight: 500;
                font-size: 1.5rem;
                color: #181818;

                width: 100%;
                text-align: center;
                background-color: unset;
                -moz-appearance: textfield;
                &::-webkit-inner-spin-button,
                &::-webkit-outer-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }
                &::-ms-clear,
                &::-ms-reveal {
                    display: none;
                }
            }
        }
        .counter_button {
            padding: 0.375rem;
            background-color: #fff;
            @include df_ac_jcc;
            cursor: pointer;
            border-radius: 0.375rem;
            svg {
                width: 1.5rem;
                height: 1.5rem;
                aspect-ratio: 1;
            }
        }
    }
</style>