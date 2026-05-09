export const useCart = () => {

    const cart = useCookie<any[]>('cart', {
        default: () => [],
    })

    const addToCart = (product: any, weight: any) => {

        const existingItem = cart.value.find(
            item =>
                item.productId === product.id &&
                item.weightId === weight.id
        )

        if (existingItem) {

            existingItem.quantity += 1

        } else {

            cart.value.push({

                productId: product.id,

                name: product.name,

                image: product.images?.length
                    ? product.images[0].image
                    : null,

                weightId: weight.id,

                weight: weight.weight,

                price: weight.price,

                weights: product.weights,

                quantity: 1,

            })

        }

    }

    const removeFromCart = (
        productId: number,
        weightId: number
    ) => {

        cart.value = cart.value.filter(
            item =>
                !(
                    item.productId === productId &&
                    item.weightId === weightId
                )
        )

    }

    const clearCart = () => {
        cart.value = []
    }

    const totalPrice = computed(() => {

        return cart.value.reduce((total, item) => {
            return total + item.price * item.quantity
        }, 0)

    })

    const isInCart = (
        productId: number,
        weightId: number
    ) => {

        return cart.value.some(
            item =>
                item.productId === productId &&
                item.weightId === weightId
        )

    }

    const updateQuantity = (
        productId: number,
        weightId: number,
        quantity: number
    ) => {

        const item = cart.value.find(
            item =>
                item.productId === productId &&
                item.weightId === weightId
        )

        if (!item) return

        item.quantity = quantity

        if (item.quantity <= 0) {

            removeFromCart(
                productId,
                weightId
            )

        }

    }

    const updateWeight = (
        productId: number,
        oldWeightId: number,
        newWeightId: number
    ) => {

        const item = cart.value.find(
            item =>
                item.productId === productId &&
                item.weightId === oldWeightId
        )

        if (!item) return

        const newWeight =
            item.weights.find(
                w => w.id === newWeightId
            )

        if (!newWeight) return

        item.weightId = newWeight.id

        item.weight = newWeight.weight

        item.price = newWeight.price

    }

    return {
        cart,
        addToCart,
        removeFromCart,
        clearCart,
        totalPrice,
        isInCart,
        updateQuantity,
        updateWeight
    }
}