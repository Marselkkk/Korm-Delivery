<script lang="ts" setup>

    const backendUrl = 'https://www.ptnasily.ru'

    const {
        cart,
        totalPrice,
        removeFromCart,
        clearCart,
        updateQuantity,
    } = useCart();

    const showOrderModal = ref(false)
    const orderSuccess = ref(false)
    const orderError = ref(false)

    const { public: { apiBase } } = useRuntimeConfig()

    const handleOrderSubmit = async (formData: {
        city: string | number | null,
        street: string,
        house: string,
        phone: string,
    }) => {
        orderError.value = false
        try {
            await $fetch(`${apiBase}/orders`, {
                method: 'POST',
                body: {
                    city: formData.city,
                    street: formData.street,
                    house: formData.house,
                    phone: formData.phone,
                    items: cart.value.map(item => ({
                        productId: item.productId,
                        weightId: item.weightId,
                        quantity: item.quantity,
                    })),
                },
            })
            showOrderModal.value = false
            orderSuccess.value = true
            clearCart()
        } catch {
            orderError.value = true
        }
    }
</script>

<template>
    <Header></Header>
    <HeroSecond type="cart"
    page="Корзина"
    title="Корзина"
    desc="Мы собрали здесь всё, что вы выбрали для здоровья и радости вашего питомца." />

    <section>
        <div class="cart-section">
            <div class="cart-section__container">
                <div class="cart-section__header">
                    <div class="cart-section__header__button-block">
                        <!-- <ElementCheckbox>
                            Выбрать все
                        </ElementCheckbox> -->
                        <Button color="accent"
                        size="large"
                        @click="showOrderModal = true">
                            Заказать
                        </Button>
                    </div>
                    <hr>
                </div>
                <div class="cart-section__info-block">
                    <ProductCardCart
                        v-for="item in cart"
                        :key="`${item.productId}-${item.weightId}`"

                        :name="item.name"
                        :image="`${backendUrl}/storage/${item.image}`"

                        :quantity="item.quantity"

                        :selectedWeightId="item.weightId"

                        :weights="item.weights || []"

                        @remove="removeFromCart(item.productId, item.weightId)"

                        @updateQuantity="
                            updateQuantity(
                                item.productId,
                                item.weightId,
                                $event
                            )
                        "

                        @updateWeight="
                            updateWeight(
                                item.productId,
                                item.weightId,
                                $event
                            )
                        "
                    />
                </div>
            </div>
        </div>
    </section>

    <Footer></Footer>

    <ModalOrder
        :show="showOrderModal"
        :error="orderError"
        @close="showOrderModal = false"
        @submit="handleOrderSubmit"
    />

    <Transition name="modal">
        <div v-if="orderSuccess" class="order-success-overlay" @click="orderSuccess = false">
            <div class="order-success-card">
                <p class="order-success-card__title">Заказ оформлен!</p>
                <p class="order-success-card__text">Мы свяжемся с вами по номеру телефона для подтверждения.</p>
                <Button color="accent" size="large" @click="orderSuccess = false">Хорошо</Button>
            </div>
        </div>
    </Transition>
</template>

<style lang="scss">
    .order-success-overlay {
        position: fixed;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.45);
        z-index: 1000;
        @include df_ac_jcc;
    }
    .order-success-card {
        background-color: #F8F2D5;
        border-radius: 1rem;
        padding: 2.5rem 3rem;
        max-width: 24rem;
        width: 100%;
        @include df_fdc;
        align-items: center;
        gap: 1rem;
        text-align: center;
        @include mobile {
            margin: 1rem;
        }
        &__title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #181818;
            @include manrope;
        }
        &__text {
            font-size: 1rem;
            color: #555;
            @include manrope;
        }
        .button { width: 100%; }
    }
    .cart-section {
        margin: 3.75rem 6.25rem 0;
        @include mobile {
            margin: 0;
        }
        &__container {
            background-color: #F8F2D5;
        }
        &__header {
            padding: 1.875rem 2.5rem;
            @include df_fdc;
            gap: 1.25rem;
            &__button-block {
                @include df_jb_ac;
                @include mobile {
                    .button {
                        width: 100%;
                    }
                }
            }
            hr {
                border: 0;
                border-bottom: 2px solid #181818;
            }
        }
        &__info-block {
            padding: 3.75rem 2.5rem;
        }
    }
</style>