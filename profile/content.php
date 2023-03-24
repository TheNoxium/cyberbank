Ваш логин: <?php echo htmlspecialchars($user['Login']); ?> <a href="edit">[Изменить]</a><br>
Ваш пароль: <?php echo htmlspecialchars($user['Password']); ?> <a href="edit-passwd">[Изменить]</a><br>
Ваши права: <?php echo access($user['access']); ?>