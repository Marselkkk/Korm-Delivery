<script lang="ts" setup>
    const props = defineProps<{
        show: boolean
        error?: boolean
    }>()

    const emit = defineEmits<{
        (e: 'close'): void
        (e: 'submit', data: { city: string | number | null, street: string, house: string, phone: string }): void
    }>()

    const loading = ref(false)

    const cityOptions = [
        { label: 'Москва', value: 'moscow' },
        { label: 'Санкт-Петербург', value: 'spb' },
        { label: 'Казань', value: 'kazan' },
        { label: 'Новосибирск', value: 'novosibirsk' },
    ]

    const city = ref<string | number | null>(null)
    const street = ref('')
    const house = ref('')
    const phone = ref('')

    const closeOnBackdrop = (e: MouseEvent) => {
        if ((e.target as HTMLElement).classList.contains('modal-overlay')) {
            emit('close')
        }
    }

    const handleSubmit = async () => {
        loading.value = true
        await emit('submit', {
            city: city.value,
            street: street.value,
            house: house.value,
            phone: phone.value,
        })
        loading.value = false
    }
</script>

<template>
    <Transition name="modal">
        <div v-if="show" class="modal-overlay" @click="closeOnBackdrop">
            <div class="modal-order">
                <button class="modal-order__close" @click="emit('close')">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L15 15M15 1L1 15" stroke="#181818" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
                <h2 class="modal-order__title">Адрес доставки</h2>
                <div class="modal-order__fields">
                    <ElementSelect
                        v-model="city"
                        :options="cityOptions"
                        placeholder="Город"
                        color="white"
                    />
                    <input
                        v-model="street"
                        class="modal-order__input"
                        type="text"
                        placeholder="Улица"
                    />
                    <input
                        v-model="house"
                        class="modal-order__input"
                        type="text"
                        placeholder="Дом"
                    />
                    <input
                        v-model="phone"
                        class="modal-order__input"
                        type="tel"
                        placeholder="Номер телефона"
                    />
                </div>
                <p v-if="error" class="modal-order__error">Ошибка при оформлении. Попробуйте снова.</p>
                <Button color="accent" size="large" @click="handleSubmit" :disabled="loading">
                    {{ loading ? 'Оформляем...' : 'Оформить заказ' }}
                </Button>
            </div>
        </div>
    </Transition>
</template>

<style lang="scss">
    .modal-overlay {
        position: fixed;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.45);
        z-index: 1000;
        @include df_ac_jcc;
    }

    .modal-order {
        position: relative;
        background-color: #F8F2D5;
        border-radius: 1rem;
        padding: 2.5rem 3rem;
        width: 100%;
        max-width: 26rem;
        @include df_fdc;
        align-items: center;
        gap: 1.25rem;
        @include mobile {
            margin: 1rem;
            padding: 2rem 1.5rem;
        }

        &__close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: transparent;
            cursor: pointer;
            padding: 0.25rem;
            @include df_ac_jcc;
        }

        &__title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #181818;
            @include manrope;
            text-align: center;
        }

        &__fields {
            @include df_fdc;
            gap: 0.75rem;
            width: 100%;

            .dropdown {
                width: 100%;
                border: 1px solid #c5c5c5;
                border-radius: 0.5rem;
                background-color: #fff;
                &__trigger {
                    padding: 0.75rem 1rem;
                    font-size: 1rem;
                }
            }
        }

        &__input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #c5c5c5;
            border-radius: 0.5rem;
            background-color: #fff;
            font-size: 1rem;
            color: #181818;
            @include manrope;
            box-sizing: border-box;
            outline: none;
            @include transition(border-color);

            &::placeholder {
                color: #9e9e9e;
            }
            &:focus {
                border-color: #CCBA4B;
            }
        }

        &__error {
            color: #c0392b;
            font-size: 0.875rem;
            @include manrope;
            text-align: center;
        }

        .button {
            width: 100%;
            &:disabled {
                opacity: 0.6;
                cursor: not-allowed;
            }
        }
    }

    .modal-enter-active,
    .modal-leave-active {
        transition: opacity 0.2s ease;
        .modal-order {
            transition: transform 0.2s ease, opacity 0.2s ease;
        }
    }
    .modal-enter-from,
    .modal-leave-to {
        opacity: 0;
        .modal-order {
            transform: scale(0.95);
            opacity: 0;
        }
    }
</style>
