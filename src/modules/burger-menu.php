<div class="burger-menu">
	<ul class="burger-menu__list">
		<?
			$link = mysqli_connect($host, $username, $password, $database)
				or die('Error! ' . mysqli_error($link));
			$query = "SELECT * FROM DEVICE_GROUP";
			$result = mysqli_query($link, $query)
				or die('Error! ' . mysqli_error($link));

			if ($result)
			{
				for ($i = 0; $i < mysqli_num_rows($result); ++$i)
				{
					$row = mysqli_fetch_row($result);
					 /*
					  * $row[0] - device_group_id
					  * $row[1] - device_group_url
					  * $row[2] - device_group_name
					 */

					?>
						<li class="burger-menu__list-item">
							<a href="/<?=$row[1]?>" class="burger-menu__list-link"><?=$row[2]?></a>
							<svg class="burger-menu__list-item-icon">
								<use xlink:href="./images/stack/sprite.svg#right-arrow"></use>
							</svg>
						</li>
					<?
				}
			}
			mysqli_close($link);
		?>
	</ul>
</div>