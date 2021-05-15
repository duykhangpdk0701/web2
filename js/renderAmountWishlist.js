const renderAmountWishlist = async () => {
  const wishlistCountData = await fetch("./includes/amountWishlist.inc.php");
  const wishlistCount = document.querySelector(".wish-list-number");
  wishlistCount.textContent = wishlistCountData;
};

const renderAmountWishlistNoFetch = (wishlistAmount) => {
  const wishlistCount = document.querySelector(".wish-list-number");
  wishlistCount.textContent = wishlistAmount;
};

export { renderAmountWishlist, renderAmountWishlistNoFetch };
