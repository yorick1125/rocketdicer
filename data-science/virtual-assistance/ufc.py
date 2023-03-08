import pygame

# Initialize pygame and set up screen
pygame.init()
screen = pygame.display.set_mode((800, 600))

# Load player images
player1_image = pygame.image.load("player1.png")
player2_image = pygame.image.load("player2.png")

# Set player positions
player1_x = 100
player1_y = 500
player2_x = 600
player2_y = 500

# Set player speeds
player1_speed = 5
player2_speed = 5

# Set player health
player1_health = 100
player2_health = 100

# Game loop
running = True
while running:
    # Handle events
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            running = False

    # Move player 1 with arrow keys
    keys = pygame.key.get_pressed()
    if keys[pygame.K_LEFT]:
        player1_x -= player1_speed
    if keys[pygame.K_RIGHT]:
        player1_x += player1_speed
    if keys[pygame.K_UP]:
        player1_y -= player1_speed
    if keys[pygame.K_DOWN]:
        player1_y += player1_speed

    # Move player 2 with WASD keys
    if keys[pygame.K_a]:
        player2_x -= player2_speed
    if keys[pygame.K_d]:
        player2_x += player2_speed
    if keys[pygame.K_w]:
        player2_y -= player2_speed
    if keys[pygame.K_s]:
        player2_y += player2_speed

    # Check for collision and reduce health
    if (
        player1_x < player2_x + player2_image.get_width()
        and player1_x + player1_image.get_width() > player2_x
        and player1_y < player2_y + player2_image.get_height()
        and player1_y + player1_image.get_height() > player2_y
    ):
        player1_health -= 10
        player2_health -= 10

    # Clear screen
    screen.fill((255, 255, 255))

    # Draw player images
    screen.blit(player1_image, (player1_x, player1_y))
    screen.blit(player2_image, (player2_x, player2_y))

    # Update screen
    pygame.display.update()

# Quit pygame
pygame.quit()
