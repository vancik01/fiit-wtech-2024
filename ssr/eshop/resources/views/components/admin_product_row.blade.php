<div class="product-row p-2">
    <div class="flex gap-2 w-full gap-3">
        <img src="https://picsum.photos/300" alt="" class="w-[100px] h-full rounded-md aspect-square" />
        <div class="w-full">
            <h2 class="font-semibold py-1 text-lg">
                Product name that can be even this long
            </h2>
        </div>
    </div>
    <div class="py-1">12.99€</div>
    <div class="py-1">Kategória XYZ</div>
    <div class="py-1">Výrobca 123</div>
    <div class="py-1 flex flex-row gap-2">
        <div class="action-button-wraper h-fit hover:text-red-500">
            <a href="/produkty/produktXYZ"
                class="w-[32px] h-[32px] bg-gray-100 flex justify-center items-center rounded-2 text-base">
                <i class="fas fa-solid fa-trash"></i>
            </a>
            <div class="custom-tooltip">Zmazať</div>
        </div>
        <div class="action-button-wraper h-fit hover:text-blue-500">
            <a href="{{ config('urls.admin_edit_product.getPathBuilder')('product-slug') }}"
                class="w-[32px] h-[32px] bg-gray-100 flex justify-center items-center rounded-2 text-base">
                <i class="fas fa-solid fa-marker"></i>
            </a>
            <div class="custom-tooltip">Upraviť</div>
        </div>
        <div class="action-button-wraper h-fit hover:text-green-500">
            <a href="{{ config('urls.product_detail.getPathBuilder')('product-slug') }} "
                class="w-[32px] h-[32px] bg-gray-100 flex justify-center items-center rounded-2 text-base">
                <i class="fas fa-solid fa-link"></i>
            </a>
            <div class="custom-tooltip">Zobraziť</div>
        </div>
    </div>
</div>