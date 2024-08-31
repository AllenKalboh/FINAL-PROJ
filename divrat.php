<div class="rating">
                        <form action="rate_product.php" method="POST">
                            <input type="hidden" name="pid" value="<?= htmlspecialchars($fetch_product['id']); ?>">
                            <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId); ?>">
                            <label for="rating">Rate this product:</label>
                            <select name="rating" id="rating">
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                            <button type="submit">Submit Rating</button>
                        </form>
                    </div>

